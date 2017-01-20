<?php
class TipocambioCompo extends CApplicationComponent
{
    private $_model=null;
    private $_fechainicio;
    private $_fechafin;
    public $monedadefault=null;
    private $_horastolerancia;   ///Horas pasadas desde que se hizo la ultima actualizacion de moendas

    public function init(){
        $this->monedadefault=yii::app()->settings->get('general','general_monedadef');
        $this->_horastolerancia=yii::app()->settings->get('general','general_horaspasadastipocambio');
    }

    //CALCULA las moendas desactrualizadas , DESDE LA ULTIMA ACTUALIZACION
    public function cambiospasados(){

        $citer=New CDBCriteria;
        $citer->addCondition("ultima < :fechamenos ");
        //  $citer->addCondition(" codmon1 <> codmon2 ");
        $citer->params=array(":fechamenos"=>date('Y-m-d H:i:s',time()-$this->_horastolerancia*60*60));
    /*  var_dump(date('Y-m-d H:i:s',time()-$this->_horastolerancia*60*60));
        var_dump(date('Y-m-d H:i:s',time()));
        yii::app()->end();*/
        $registros= yii::app()->db->createCommand()->select("codmon1")->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryColumn();
        /*print_r($registros);
        yii::app()->end();*/
        //$registros=Tipocambio::model()->findAll($citer);
        //var_dump($registros);die();
        return array_unique($registros);
    }

    ///es el cambio de PEN->$MONEDA
    public function getventa($moneda,$fecha=null){
        if(!($moneda==$this->monedadefault)){
          
            if(is_null($fecha)){ // si se trata de una busqueda de cambioa actual 
                        $citer=New CDBCriteria;
        //$citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        //$citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
                     $citer->addCondition("codmon1=:moneda AND codmondef=:monedadefault");
                     $citer->params=array(":monedadefault"=>$this->monedadefault,":moneda"=>$moneda);        
                    $compra= yii::app()->db->createCommand()->select('venta')->
                    from('{{tipocambio}}')->
                    where($citer->condition,$citer->params)->queryScalar();
                     if($compra!=false)
                            {return $compra ;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
                            }
         
            }else{ //sise trata deuna bsuqyeda de cambios pasaods 
                return $this->getventapasada($moneda,$fecha);
            }
         
         
         
        }else{
            return 1;
        }
        

    }

    ///es el cambio de $MONEDA->PEN
    public function getcompra($moneda){
          if(!($moneda==$this->monedadefault)){
        $citer=New CDbCriteria;
         $citer->addCondition("codmon1=:moneda AND codmondef=:monedadefault");
        $citer->params=array(":monedadefault"=>$this->monedadefault,":moneda"=>$moneda);        
        $compra= yii::app()->db->createCommand()->select('compra')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
        if($compra!=false)
        {return $compra;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        }
          }else{
              return 1;
          }

    }



    ///es el cambio en general, ne se oprden  $moneda1 =>$moneda 2
    public function getcambio($moneda1,$moneda2){
        if($moneda1==$this->monedadefault)
          return  $this->getventa ($moneda2);
         if($moneda2==$this->monedadefault)
          return  $this->getcompra ($moneda1);
         
         
         
        $primercambio=$this->getventa($moneda1);
        $segundocambio=$this->getventa($moneda2);
          if($segundocambio <>0 and !isnull($segundocambio)){
               return round($primercambio/$segundocambio,3);
          }else{
              throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio para la conversion de las monedas  '.$moneda1."  ->  ".$moneda2);
        
          }
             
        
        

    }

    private function lastupdateventa($moneda)
    {
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $ultima= yii::app()->db->createCommand()->select('ultima')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryScalar();
        //var_dump($moneda);yii::app()->end();
        //if(!$ultima!=false)
          // throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        return strtotime($ultima.'');

    }



    public function setcompra($moneda,$valorcompra){
        //echo time() - $this->lastupdateventa($moneda);
        //yii::app()->end();
        if( (1/$this->getVenta($moneda) <= $valorcompra))
        if((time() - $this->lastupdateventa($moneda)) < 300)
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.' El valor de  la compra '.$valorcompra.' de la moneda '.$moneda.'  no puede ser mayor que la venta '.$this->getventa($moneda));
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedaacomprar AND codmon2=:monedadef");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $compra= Tipocambio::model()->find($citer);
        if(is_null($compra))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.' No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        $compra->setScenario('analitica');
        $compra->setAttributes(array('cambio'=>$valorcompra,'ultima'=>date('Y-m-d H:i:s')));
            $compra->validate();
              if(count($compra->geterrors())>0)
                 // print_r($compra->geterrors());
       // yii::app()->end();
                  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha podido registrar la compra de la moneda '.$moneda.'  Revise el valor del cambio ');
            return $compra->save();

    }

    public function setventa($moneda,$valorventa){
        if( $this->getCompra($moneda) >=($valorventa) and ((time() - $this->lastupdateventa($moneda)) < (60*5)))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  El valor de  la venta de la moneda '.$moneda.'  no puede ser menor que la compra ');
        $citer=New CDBCriteria;
        $citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $venta= Tipocambio::model()->find($citer);
        if(is_null($venta))
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
       $venta->setScenario('analitica');
        $venta->setAttributes(array('cambio'=>(1/$valorventa),'ultima'=>date('Y-m-d H:i:s')));
        $venta->validate();
        if(count($venta->geterrors())>0)
            //print_r($venta->geterrors());
          //yii::app()->end();
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha podido registrar la compra de la moneda '.$moneda.'  Revise el valor del cambio ');
        return $venta->save();

    }

    public function monedasexternas(){
        $monedas= yii::app()->db->createCommand()->selectDistinct('codmon1')->
        from('{{tipocambio}}')->where('codmon1 <> :vmon',array(':vmon'=>$this->monedadefault))->queryColumn();
        return array_combine($monedas,$monedas);

    }

   public function agregarmoneda($codmon,$seguir=false){
            $codmon=MiFactoria::cleanInput($codmon);
            if($codmon== $this->monedadefault) //sie edls amima moneda por defecto error 
               throw new CHttpException(500,'El codigo de la moneda tiene que ser distinto al de la moneda por defecto');      
            $registro= Monedas::model()->findByPK($codmon);
            if(is_null($registro)) //si no exixte le codigo de la moneda 
                throw new CHttpException(500,'El codigo de la moneda no existe');
            if(in_array($codmon,array_keys($this->monedasexternas()))) ///si ya existe este cambio
               throw new CHttpException(500,'La moneda que intneta gregar , ya se enreuntra registrada');     
          
            $registrox=New Tipocambio('nuevamoneda');
            $registrox->setAttributes(array(
                                        'codmondef'=>$this->monedadefault,
                                         'codmon1'=>$codmon,
                                         'seguir'=>($seguir)?"1":"0",
                                        ));
            $registrox->save();
            
	    
   }
    
   public function getcambioremoto($moneda){
     $moneda=MiFactoria::cleanInput($moneda);
     $registro= Monedas::model()->findByPk($moneda);
    if(is_null($registro)) //si no exixte le codigo de la moneda 
                throw new CHttpException(500,'El codigo de la moneda no existe');
      
// remote method parameters are passed as an array
    return  $this->servicioremoto($moneda);
                
   
    
   }
   
   private function servicioremoto($moneda){
       $client = Yii::createComponent
                    (
               array(
                    'class' => 'ext.GWebService.GSoapClient',
                    'wsdlUrl' => 'http://www.webservicex.net/CurrencyConvertor.asmx?WSDL'
                      )  
               );
       try{
           $arreglo=$client->call('ConversionRate', 
                   array(
                       'FromCurrency'=>$moneda,
                       'ToCurrency'=>$this->monedadefault
                       )
                   );
       } catch (Exception $ex) {
          return -1;
       }
      return $arreglo["ConversionRateResult"];
   }
   
   public function log($moneda){
       
         //$crit->addCondition("codmon=:vcodmon");
       //$pasados=$this->cambiospasados();
      //var_dump($pasados);die();
       //foreach($pasados as $clave=>$moneda){
           $registro=$this->registroactual($moneda);
           if($registro[0]['seguir']=='1'){ //si tiene marcada la opcion de SEGUIMIENTO 
             $crit=New CDbCriteria();
       $crit->addCondition("fecha=:vfecha");
        $crit->addCondition("hidcambio=:vhidcambio");
        $crit->params=array(
            ":vfecha"=>date('Y-m-d', strtotime($registro[0]['ultima'])),
            ":vhidcambio"=>$registro[0]['id'],
        );
               $existe=yii::app()->db->createCommand()->
                      select('id')->from('{{logtipocambio}}')->
                      where($crit->condition,$crit->params)->queryScalar();
              if($existe !=false) { //Si  existe  actualizar
                 yii::app()->db->createCommand()->
                      update('{{logtipocambio}}',
                      array( 'compra'=> $registro[0]['compra'],
                          'venta'=> $registro[0]['venta']),
                            $crit->condition,
                          $crit->params);
              }else{ //si no existe insertar
                yii::app()->db->createCommand()->
                 insert("{{logtipocambio}}",
                         array(
                             'hidcambio'=>$registro[0]['id'],
                             'compra'=>$registro[0]['compra'],
                             'codmon'=>$registro[0]['codmon1'],
                              'codmondef'=>$registro[0]['codmondef'],
                             'venta'=>$registro[0]['venta'],
                             'fecha'=>date('Y-m-d'),
                              'dia'=>date("w",time()),
                              'iduser'=>$registro[0]['iduser'],
                         )
                         );    
              }
               
               
           }
           //var_dump($registro);
           //VAR_DUMP($registro['id']);
         
           //ECHO "<BR><BR><BR>";
      // }
     // DIE();
         
         
       
   }
   
   private function registroactual($moneda){
        $citer=New CDBCriteria;
        $citer->addCondition("codmondef=:monedadef AND codmon1=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $ultima= yii::app()->db->createCommand()->select('id,seguir,codmondef,codmon1,compra,venta,dia,ultima,iduser')->
        from('{{tipocambio}}')->
        where($citer->condition,$citer->params)->queryAll();
        //var_dump($moneda);yii::app()->end();
        //if(!$ultima!=false)
          // throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
        return $ultima;
   }
   
   private function getventapasada($moneda, $fecha){
     //antes que nada verifica que la fecha no sea la del cambio actual
       $registroactual=$this->registroactual($moneda);
   
     if($fecha==date('Y-m-d',strtotime($registroactual->ultima)).''){
         return $registroactual->venta;
     }else{
          
       $cambios= yii::app()->db->createCommand()->
                select('venta')->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fecha,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll();
       if(count($cambios)>0){ //si existe y lo enucentra bien ...!
           return $cambios[0]['venta'];
       }else{ //oh oh aqui si puede haber probelmas 
            $fechainferior= yii::app()->db->createCommand()->
                select('max(fecha)')->
           from('{{logtipocambio}}')->
           where("fecha <= :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fecha,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryScalar();
        
         $fechasuperior= yii::app()->db->createCommand()->
                select('max(fecha)')->
           from('{{logtipocambio}}')->
           where("fecha >= :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fecha,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryScalar();
         
           //ahora analizamos los casos  
        if($fechasuperior!=false and $fechainferior!=false){
            //evaluar para donde esta mas proximo
            $difup=strtotime($fechasuperior)-strtotime($fecha);
            $difdown=strtotime($fecha)-strtotime($fechainferior);
            if($difup >= $difdown){
                IF($this->_horastolerancia < $difup/(60*60))
                    MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              return   yii::app()->db->createCommand()->
                select('venta')->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechainferior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0]['venta'];
            }else{
                 IF($this->_horastolerancia < $difdown/(60*60))
                    MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              
                return   yii::app()->db->createCommand()->
                select('venta')->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechasuperior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0]['venta'];
            }
            
        }
        
        ///Si no hay fechas posteriores, tomar la inferior
        if($fechasuperior===false and $fechainferior!=false){
             //$difup=strtotime($fechasuperior)-strtotime($fecha);
            $difdown=strtotime($fecha)-strtotime($fechainferior);
            //if($difup >= $difdown){
                IF($this->_horastolerancia < $difdown/(60*60))
                     MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              
            return   yii::app()->db->createCommand()->
                select('venta')->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechainferior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0]['venta'];
        }
           
            ///Si no hay fechas anterioroes tomar la superior
        if($fechasuperior!=false and $fechainferior===false){
             $difup=strtotime($fechasuperior)-strtotime($fecha);
            //if($difup >= $difdown){
                IF($this->_horastolerancia < $difup/(60*60))
                     MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              
            return   yii::app()->db->createCommand()->
                select('venta')->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechasuperior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0]['venta'];
        }
        
        ///Si no hay fechas anteriores ni posteriores , entonces estamos mal...!
        if($fechasuperior===false and $fechainferior===false){
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio para la conversion de las monedas  '.$this->monedadefault."  ->  ".$moneda."  En la fecha ".$fecha."  Tampoco existen valores aproximados ");
        
        }
        
     }
         
      
           
       }
       
       
      
        
        
   
   
}

}
?>
