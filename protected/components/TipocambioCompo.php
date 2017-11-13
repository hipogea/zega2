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
        $citer->addCondition("ultima < :fechamenos and codmon1 <> :vcodmon1 and activa='1'");
        //  $citer->addCondition(" codmon1 <> codmon2 ");
        $citer->params=array(":vcodmon1"=>$this->monedadefault ,":fechamenos"=>date('Y-m-d H:i:s',time()-$this->_horastolerancia*60*60));
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
                            {return $compra ;}else{ 
                                
                                throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
                            }
         
            }else{ //sise trata deuna bsuqyeda de cambios pasaods 
                return $this->getcambiopasado($moneda,$fecha,'venta');
            }
         
         
         
        }else{
            return 1;
        }
        

    }

    ///es el cambio de $MONEDA->PEN
    public function getcompra($moneda,$fecha=null){
         if(!($moneda==$this->monedadefault)){
          
            if(is_null($fecha)){ // si se trata de una busqueda de cambioa actual 
                        $citer=New CDBCriteria;
        //$citer->addCondition("codmon1=:monedadef AND codmon2=:monedaacomprar");
        //$citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
                     $citer->addCondition("codmon1=:moneda AND codmondef=:monedadefault");
                     $citer->params=array(":monedadefault"=>$this->monedadefault,":moneda"=>$moneda);        
                    $compra= yii::app()->db->createCommand()->select('compra')->
                    from('{{tipocambio}}')->
                    where($citer->condition,$citer->params)->queryScalar();
                     if($compra!=false)
                            {return $compra ;}else{  throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
                            }
         
            }else{ //sise trata deuna bsuqyeda de cambios pasaods 
                return $this->getcambiopasado($moneda,$fecha,'compra');
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
                                          'activa'=>'1',
                                            'compra'=>1,
                                                'venta'=>1,
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
       IF($moneda==$this->monedadefault){
           
       }else{
         //$crit->addCondition("codmon=:vcodmon");
       //$pasados=$this->cambiospasados();
      //var_dump($pasados);die();
       //foreach($pasados as $clave=>$moneda){
           $registro=$this->registroactual($moneda);
           if($registro->seguir='1'){ //si tiene marcada la opcion de SEGUIMIENTO 
             $crit=New CDbCriteria();
       $crit->addCondition("fecha=:vfecha");
        $crit->addCondition("hidcambio=:vhidcambio");
        $crit->params=array(
            ":vfecha"=>date('Y-m-d', strtotime($registro->ultima)),
            ":vhidcambio"=>$registro->id,
        );
               $existe=yii::app()->db->createCommand()->
                      select('id')->from('{{logtipocambio}}')->
                      where($crit->condition,$crit->params)->queryScalar();
              if($existe !=false) { //Si  existe  actualizar
                 yii::app()->db->createCommand()->
                      update('{{logtipocambio}}',
                      array( 'compra'=> $registro->compra,
                          'venta'=> $registro->venta),
                            $crit->condition,
                          $crit->params);
              }else{ //si no existe insertar
                yii::app()->db->createCommand()->
                 insert("{{logtipocambio}}",
                         array(
                             'hidcambio'=>$registro->id,
                             'compra'=>$registro->compra,
                             'codmon'=>$registro->codmon1,
                              'codmondef'=>$registro->codmondef,
                             'venta'=>$registro->venta,
                             'fecha'=>date('Y-m-d'),
                              'dia'=>date("w",time()),
                              'iduser'=>$registro->iduser,
                             'diaano'=>date("z",time()),
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
       
   }
   
   public function registroactual($moneda,$fila=false){
      if($moneda==$this->monedadefault) {
         return null;
      }else{
         $citer=New CDBCriteria;
        $citer->addCondition("codmondef=:monedadef AND codmon1=:monedaacomprar");
        $citer->params=array(":monedadef"=>$this->monedadefault,":monedaacomprar"=>$moneda);
        $ultima= Tipocambio::model()->find($citer);
        //var_dump($moneda);yii::app()->end();
        //if(!$ultima!=false)
          // throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio compra para la moneda '.$moneda);
       
        return $ultima; 
      }
       
   }
   
   private function getcambiopasado($moneda, $fecha,$tipocambio){
      if($this->monedadefault==$moneda){
          return 1;
      }else{
         //antes que nada verifica que la fecha no sea la del cambio actual
       $registroactual=$this->registroactual($moneda);
   
     if($fecha==date('Y-m-d',strtotime($registroactual->ultima)).''){
         return $registroactual->venta;
     }else{
          
       $cambios= yii::app()->db->createCommand()->
                select($tipocambio)->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fecha,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll();
       if(count($cambios)>0){ //si existe y lo enucentra bien ...!
           return $cambios[0][$tipocambio];
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
                select($tipocambio)->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechainferior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0][$tipocambio];
            }else{
                 IF($this->_horastolerancia < $difdown/(60*60))
                    MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              
                return   yii::app()->db->createCommand()->
                select($tipocambio)->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechasuperior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0][$tipocambio];
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
                select($tipocambio)->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechainferior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0][$tipocambio];
        }
           
            ///Si no hay fechas anterioroes tomar la superior
        if($fechasuperior!=false and $fechainferior===false){
             $difup=strtotime($fechasuperior)-strtotime($fecha);
            //if($difup >= $difdown){
                IF($this->_horastolerancia < $difup/(60*60))
                     MiFactoria::Mensaje ('notice', "Se ha tomado un tipo de cambio con fecha de aproximacion mayor a las ".$this->_horastolerancia."  horas");
              
            return   yii::app()->db->createCommand()->
                select($tipocambio)->
           from('{{logtipocambio}}')->
           where("fecha = :fechita and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechita"=>$fechasuperior,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->queryAll()[0][$tipocambio];
        }
        
        ///Si no hay fechas anteriores ni posteriores , entonces estamos mal...!
        if($fechasuperior===false and $fechainferior===false){
            throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  No se ha registrado tipo de cambio para la conversion de las monedas  '.$this->monedadefault."  ->  ".$moneda."  En la fecha ".$fecha."  Tampoco existen valores aproximados ");
        
        }
        
     }
         
      
           
       }
       
       
      
        
        
    
      }
     
   
}


         /*******************
       * Devuelve un array de fechas 
       * que estan entre  @fecha1 y @fecha2  inclusive
       * descubrinedo las vacancias de dias en que falta
       * llenar el tipo de cambio 
       */
        
private function vacancias($moneda,$fecha1,$fecha2){
            
            if(!yii::app()->periodo->verificaFechas($fecha1,$fecha2))
               throw new CHttpException(500,__CLASS__.' '.__FUNCTION__.'  '.__LINE__.'  Las fecha inferior es mayor que la fecha posterior , revise  los parametros de la funcion VACANCIAS');        
           
            IF(yii::app()->periodo->verificaFechas(date('Y-m-d'),$fecha2))
                //esta en futuro 
                $fecha2=DATE('Y-m-d',time()-24*60*60);
            
           /* $fechaultimaactualizacion=date('Y-m-d', $this->registroactual($moneda)->ultima);
           
            //si la ultima fecha de actualizacion , es menor que la fecha limite supeiror
            //entonces  ha faltado actualizar algunos dias Y SE DEBE DE HACER URGENTE en la tabla tipocambio 
            if(yii::app()->periodo->verificaFechas($fechaultimaactualizacion,$fecha2)){
                
                
            }else{ //El caso de la 
                
            }*/
            
           $fechas= yii::app()->db->createCommand()->
                select('fecha')->
           from('{{logtipocambio}}')->
           where("fecha <= :fechitasup and fecha >=:fechitainf and codmon=:vcodmon and codmondef=:vcodmondef",
           array(":fechitainf"=>$fecha1,":fechitasup"=>$fecha2,":vcodmon"=>$moneda,":vcodmondef"=>$this->monedadefault)
                   )->order("fecha ASC")->queryColumn();
           //VAR_DUMP($fechas);
           //ya tenemos los dias en fechas m ahora revisemos las vacancias 
            $diferencias=array();
            if(count($fechas)>0){
                $fechaprueba=$fecha1;
               while($fechaprueba <=$fecha2){
                   if(!in_array($fechaprueba,$fechas)){
                       $searreglo=false;
                         //verificar si esta comfiguarada la opcio para llenar los vacantes con 
                       ///feriados y fina de semana reytroactivos 
                       //es decir el tipo de cambio de sabados y dominfgs lo llebnamos con le ultimo viernes
                        if(in_array(date('w',strtotime($fechaprueba)),array('0','6'))){
                          if(yii::app()->settings->get('general','general_cambiofindesemana')=='1'){
                              if(date('w',strtotime($fechaprueba))=='6'){//si es sabado
                              $fechaviernes=date('Y-m-d',strtotime($fechaprueba)-24*60*60);
                             
                              
                              }
                               if(date('w',strtotime($fechaprueba))=='0'){//si Domingo
                              $fechaviernes=date('Y-m-d',strtotime($fechaprueba)-2*24*60*60);
                              
                              }
                                      $compraviernes=$this->getcompra($moneda,$fechaviernes);
                                      $ventaviernes=$this->getventa($moneda,$fechaviernes);                                  
                                  if(!is_null($ventaviernes) and !is_null($compraviernes))
                                  {
                                      $registro=New Logtipocambio();
                                      $plantilla=$this->registroactual($moneda);
                                      $registro->setAttributes(
                                                      array(
                                                         'hidcambio'=>$plantilla->id,
                                                         'compra'=>$compraviernes,
                                                        'codmon'=>$moneda,
                                                        'codmondef'=>$this->monedadefault,
                                                        'venta'=>$ventaviernes,
                                                        'fecha'=>$fechaprueba,
                                                        'dia'=>date("w",strtotime($fechaprueba)),
                                                         'iduser'=>yii::app()->user->id,
                                                            'diaano'=>date("z",strtotime($fechaprueba)),
                                                        )   
                                              );
                                     If( $registro->save())
                                         $searreglo=true;
                                  }
                                  unset($registro);
                              } 
                              
                               
                               
                          }
                          if(!$searreglo)
                          $diferencias[]=$fechaprueba; 
                           }
                           
                          $fechaprueba=date('Y-m-d', strtotime($fechaprueba)+24*60*60);    
                        }
                        return $diferencias;
              
            }else{
              $fechaprueba=$fecha1;
               while($fechaprueba <=$fecha2){
                  $diferencias[]=$fechaprueba;  
                  $fechaprueba=date('Y-m-d', strtotime($fechaprueba)+24*60*60); 
               }
               return $diferencias;
            }
       }
       
       
      
  public function monedasactivas(){
       return yii::app()->db->createCommand()->
                select('codmon1')->
           from('{{tipocambio}}')->where("codmon1<>:cdoc and activa='1'",array(":cdoc"=>$this->monedadefault))->
           queryColumn();
  }

        public function vacanciastotales($fecha1,$fecha2){
            $dias=array();
           // var_dump($this->monedasactivas());die();
           foreach($this->monedasactivas() as $clave=>$valor){
              // var_dump($this->vacancias($valor, $fecha1, $fecha2));
               $dias=array_merge($dias,$this->vacancias($valor, $fecha1, $fecha2));
           }
           return array_unique($dias);
        }

   public function desactivamoneda($id){
       $mode= Tipocambio::model()->findByPk(MiFactoria::cleanInput($id));
        if(!is_null($mode)){
                 
                 $mode->setScenario('activar');
                 $mode->activa='0';
               if($mode->save()){
                   MiFactoria::Mensaje('success', 'Se desactivo la moneda '.$mode->codmon1);
               }else{
                   MiFactoria::Mensaje('error', 'No se pudo desactivar la moneda '.$mode->codmon1. '  '.yii::app()->mensajes->getErroresItem($mode->geterrors())); 
               }
              
              }  
              
              
              
   }
   
    public function activamoneda($codmon){
       if(yii::app()->db->createCommand()->
                select('codmon1')->
           from('{{tipocambio}}')->where("codmon1=:cdoc",array(":cdoc"=>$codmon))->
           queryScalar()===false)
      MiFactoria::Mensaje('error', 'No se encontro la moneda '.$codmon. ' En el registro de cambios, agréguela '); 
             
       $mode= Tipocambio::model()->find("codmon1=:cosd",array(":cosd"=>$codmon));
        if(!is_null($mode)){
                 
                 $mode->setScenario('activar');
                 $mode->activa='1';
               if($mode->save()){
                   MiFactoria::Mensaje('success', 'Se desactivo la moneda '.$mode->codmon1);
               }else{
                   MiFactoria::Mensaje('error', 'No se pudo desactivar la moneda '.$mode->codmon1. '  '.yii::app()->mensajes->getErroresItem($mode->geterrors())); 
               }
              
              } 
    }
   
}
?>
