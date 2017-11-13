<?php
class PeriodosCompo extends CApplicationComponent
{
    private $_model=null;
    private $_fechainicio;
    private $_fechafin;
  
    
  
   
    //busca de ntro de los periodos activos el mas reciente 
    private function setModel($idperiodo=null)
    {
        if(!$this->_model){
            $cri=New CDbCriteria();
            $cri->addCondition("activo='1'");
            if(!is_null($idperiodo)){
                $idperiodo= (integer)MiFactoria::cleanInput($idperiodo);
                 $cri->addCondition("id=".$idperiodo);
            }
               
            $cri->order="id DESC";
            $objetito=Periodos::model()->findAll($cri)[0];unset($cri);
        if(is_null($objetito))
            throw new CHttpException(500,__CLASS__.'   No se ha activado nigun periodo ');
       //if  (!$this->HoyDentroDe($objetito->inicio,$objetito->final))
         //  throw new CHttpException(500,__CLASS__.'  La fecha actual no se encuentra dentro del periodo activo ');
          $this->_model=$objetito;
          }
        return  $this->_model;
    }

    public function getModel($idperiodo=null)
    {
         $this->setModel($idperiodo);
              return $this->_model;
    }



   /*  verificA QUE FECHA 1 SEA MENOR QUE FECHA2
   */
    public function verificaFechas($fechaini,$fechafin,$puedeserigual=null)
    {
        $fechafin=$this->toISO($fechafin);
         $fechaini=$this->toISO($fechaini);
        $fechafin=date('Y-m-d H:i:s',strtotime($fechafin.''));
        $fechaini=date('Y-m-d H:i:s',strtotime($fechaini.''));

      if( strtotime($fechaini.'')  > strtotime($fechafin.'')){

          return false;
      } else {

           return true;
      }

    }

    /*  verificA QUE FECHA 2 ESTE DENTRO
     DE  FECHA 1 Y FECHA 3
  */

    public function estadentrodefechas($fecha1,$fecha2,$fecha3,$incluye=false){
        $retorno=false;
         if($this->verificaFechas($fecha1,$fecha2,$incluye))
            if($this->verificaFechas($fecha2,$fecha3,$incluye))
             $retorno=true;
        return $retorno;

    }

  /*vERIFICA QUE LÑA FECHA ACTUAL ESTA DENTRO DE LA FECHAIN Y LA FECHAFIN*/

   public function HoyDentroDe($fechaini,$fechafin)
    {
        $fechafin=$this->toISO($fechafin);
         $fechaini=$this->toISO($fechaini);
        $hoy=date('Y-m-d',time());
        if( strtotime($fechaini.'')  > strtotime($fechafin.'')){
            return false;
             } else {
            if(strtotime($hoy.'') >=strtotime($fechaini.'') and strtotime($hoy.'') <=strtotime($fechafin.'')){
                return true;
            }else {
                 return false;
            }
        }

    }



public function estadentroperiodo($fecha,$verificatolerancia=false,$idperiodo=null){
   $fecha=$this->toISO($fecha);
         
    $fecha=date('Y-m-d',strtotime($fecha));
    $modelperiodoactivo=$this->getModel($idperiodo);
    //VAR_DUMP($modelperiodoactivo);YII::APP()->END();
    if($verificatolerancia) {
        $fechaposterior=date('Y-m-d',strtotime($modelperiodoactivo->fechamaxima())+strtotime($modelperiodoactivo->toleranciadelante)*24*60);
        $fechaanterior=date('Y-m-d',strtotime($modelperiodoactivo->fechaminima())-strtotime($modelperiodoactivo->toleranciaatras)*24*60);

    }else{
        $fechaposterior=$modelperiodoactivo->fechamaxima();
        $fechaanterior=$modelperiodoactivo->fechaminima();

    }
   // var_dump($fechaanterior);var_dump($fecha);var_dump($fechaposterior);
  return  $this->estadentrodefechas($fechaanterior,$fecha,$fechaposterior);

}

public function estadentroperiodosactivos($fecha,$verificatolerancia=false){
    $fecha=date('Y-m-d',strtotime($fecha));
   // $modelperiodoactivo=$this->getModel();
    //VAR_DUMP($modelperiodoactivo);YII::APP()->END();
    if($verificatolerancia) {
        $fechaposterior=date('Y-m-d',strtotime($this->fechamaxima())+strtotime($modelperiodoactivo->toleranciadelante)*24*60);
        $fechaanterior=date('Y-m-d',strtotime($this->fechaminima())-strtotime($modelperiodoactivo->toleranciaatras)*24*60);

    }else{
        $fechaposterior=$this->fechamaxima();
        $fechaanterior=$this->fechaminima();

    }
   // var_dump($fechaanterior);var_dump($fecha);var_dump($fechaposterior);
  return  $this->estadentrodefechas($fechaanterior,$fecha,$fechaposterior);

}





    public function diasentre($fecha1,$fecha2){

        if(!$this->verificaFechas($fecha1,$fecha2))
        throw new CHttpException(500,__CLASS__.'   Fechas inconsistentes ');
        $difdias=round((strtotime($fecha2.'')  - strtotime($fecha1.''))/(60*60*24),2);
        return  $difdias;

    }
    public function horasentre($fecha1,$fecha2){

        if(!$this->verificaFechas($fecha1,$fecha2))
        throw new CHttpException(500,__CLASS__.'   Fechas inconsistentes ');
        $difdias=round((strtotime($fecha2.'')  - strtotime($fecha1.''))/(60*60),2);
        return  $difdias;

    }

  public function periodosActivos(){
      return CHtml::listData($this->getModel()->findAll("activo='1'"),'id','descrilarga');
  }
  
   public function fechaminima(){
      
      return $this->getModel()->fechaminima();
  }
  
  public function fechamaxima(){
      
     return $this->getModel()->fechamaxima();
  }
  
  public function fechaParaBd($fecha){
      //var_dump(date_create($fecha));die();
     // $fecha=$this->toISO($fecha);
         
        $valor= date( yii::app()->settings->get('general','general_formatofechaingreso'),  strtotime($this->toISO($fecha).''));
   // }else{
      // return date_format(date_create($fecha), yii::app()->settings->get->general('general','general_formatofechaingreso'));
     if(strlen(trim($fecha))==10){
            return substr($valor,0,10);
        }else{
            if (substr(trim($fecha),11,8)=='00:00:00')
                    return substr($valor,0,10);
            return $valor;
        }
    }
    public function fechaParaMostrar($fecha){
        //$fecha=$this->toISO($fecha);
        //return date_format(date_create($fecha), yii::app()->settings->get->general('general','general_formatofechasalida'));
   // }else{
       $valor= date( yii::app()->settings->get('general','general_formatofechasalida'),  strtotime($this->toISO($fecha).''));
        if(strlen(trim($fecha))==10){
            return substr($valor,0,10);
        }else{
            if (substr(trim($fecha),11,8)=='00:00:00')
                    return substr($valor,0,10);
            return $valor;
        }
// 
    }
    
  
  
  PUBLIC function toISO($fecha){
     
      $valor='';
      if(strlen(''.trim($fecha))>0){
         if(strlen(trim($fecha)."")>10){//se trata de un datetime
          $valor= $this->validaformatos(substr(trim($fecha)."", 0, 10));
        if(strlen($valor)>0){
           if($this->validahoras(substr(trim($fecha),11,8))){
                   return $valor." ".substr(trim($fecha),11,8);
           }else{
              $valor=false; 
           }
        }
       
      }
      if(strlen(trim($fecha)."")==10){//se trata de un date
           
       $valor=  $this->validaformatos(trim($fecha));
      
      
      }
      if(strlen($valor)>0){
          return $valor;
          
      }
      else{
          return '';
          //throw new CHttpException(500,__CLASS__.' El formato de la fecha ['.$fecha.'] No es el adecuado o n esta permiitdo en la aplicación');
         }
      }else{
          return '';
      }
      
      
       
     
  }

   public function validaformatos($fecha){
       $hora=null;
       $fecha=trim($fecha);
       if(strlen(trim($fecha))>10){
           $hora=trim(substr ($fecha,9));
          $fecha= substr ($fecha,0,10);
       }    
            $valehoras=false; 
            if(!is_null($hora)){
                $valehoras=$this->validahoras($hora);
            }else{
                $valehoras=true;  
            }
      // var_dump(preg_match('/[0-3]{1}[0-9]{1}\/[0-1]{1}[0-9]{1}\/[1-2]{1}[0|9]{1}[0-9]{2}$/', $fecha) and $valehoras);
       
       
        if(preg_match('/[0-3]{1}[0-9]{1}\/[0-1]{1}[0-9]{1}\/[1-2]{1}[0|9]{1}[0-9]{2}$/', $fecha)
              and $valehoras ){//FORMATO  12/04/1989
               $retazos=explode("/",$fecha);//print_r($retazos);
         //var_dump($retazos[2]."-".$retazos[1]."-".$retazos[0]);
               return $retazos[2]."-".$retazos[1]."-".$retazos[0];
          } 
     elseif(preg_match ('/[0-3]{1}[0-9]{1}\-[0-1]{1}[0-9]{1}\-[1-2]{1}[0|9]{1}[0-9]{2}$/', $fecha)
            and $valehoras  ){//FORMATO  12-04-1989
        $retazos=explode("-",$fecha);
        return $retazos[2]."-".$retazos[1]."-".$retazos[0];
     }elseif(preg_match ('/[1-2]{1}[0|9]{1}[0-9]{2}\/[0-1]{1}[0-9]{1}\/[0-3]{1}[0-9]{1}$/', $fecha)
             and $valehoras ){ //FORMATO 1989/04/02
        return preg_replace('/\//', "-", $fecha);
     }elseif(preg_match ('/[1-2]{1}[0|9]{1}[0-9]{2}\-[0-1]{1}[0-9]{1}\-[0-3]{1}[0-9]{1}$/',$fecha)
             and $valehoras ){//FORMATO 1989-04-02
        return $fecha; 
     }else{
         return '';
     } 
   }
   
   public function validahoras($hora){
       $hora=trim($hora);
       $ceros="00";
      if(preg_match('/[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}/', $hora) and strlen($hora)==5){
         return  $hora.":".$ceros;
      }elseif(preg_match('/[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}:[0-5]{1}[0-9]{1}/', $hora)and strlen($hora)==8){
          return $hora;
      }else{
          return false;
      }
            
   }
   
   public static function diferenciahoras($horaini,$horafin,$decimal=true){
     //  var_dump($horafin);var_dump($horaini);
        $dif=date("H:i:s", strtotime("00:00:00") + strtotime(trim($horafin)) - strtotime(trim($horaini)) );
        /*var_dump(strtotime("00:00:00"));
       var_dump(strtotime($horafin)); 
        var_dump(strtotime($horaini)); 
          var_dump(strtotime("00:00:00") + strtotime($horafin) - strtotime($horaini) ); 
           var_dump($dif); 
        die();*/
        if($decimal){
            // VAR_DUMP($horaini); 
              $desglose=split(":", $dif);
              $dec=$desglose[0]+$desglose[1]/60;
              return round($dec,2);
             } else { return $dif;}
   }
   
   public function verificahoras($horaini,$horafin,$puedeserigual=false){
      if(strtotime($horaini) > strtotime($horafin)){
          return false;
      }elseif(strtotime($horaini) < strtotime($horafin)){
          return true;
      }else{
          return ($puedeserigual)?true:false;
      }
   }
   
   
   /**********************
    * Devuelve el periodo activo segun una fecha  si no coindide 
    * la fecha  con ninbguyn perido activco
    *  entondces retorna null
    * @fecha si no se coloca nada es la fecha actual 
    */
   public function getperiodo($fecha=null){
       if(is_null($fecha))
           $fecha=date('Y-m-d');
      if($this->estadentroperiodosactivos($fecha))
      {
         $cri=New CDbCriteria();
         
            $cri->addCondition("activo='1'");
            $cri->addCondition("mes='".date('m',strtotime($fecha))."'");
             $cri->addCondition("anno='".date('y',strtotime($fecha))."'");
            // var_dump($cri);
          return Periodos::model()->find($cri)->id;
           
      }else{
         // echo " habla"; die();
          return null;
      }
   }
   
   
   //devuelve un narray con el numero de semanas de un mes determinadop 
   //comenzando connsemanas completas , de acuerdo al dia que come4inza el mes 
    public function semanas($mes,$anno)   {
        $numero=(integer)$mes;
        
        if($numero > 0 and $numero < 13 ){
            $semanas=array();
            $anno= "20".str_pad($anno, 2, "0", STR_PAD_LEFT);
            $mes=str_pad($mes, 2, "0", STR_PAD_LEFT);
            $diainicio=strtotime($anno."-".$mes."-01");
            $semana=24*60*60*7;
            for($i = 0; $i <= 3; $i++){
               // echo " ih  ".$i."  ".date('Y-m-d',$diainicio+$i*$semana)." <br>";
                $semanas[date('W',$diainicio+$i*$semana)]=strtoupper(date('D',$diainicio+$i*$semana)." ".date('d',$diainicio+$i*$semana)." - ".date('D',$diainicio+($i+1)*$semana-24*60*60)." ".date('d',$diainicio+($i+1)*$semana-24*60*60));
            }
            return $semanas;
        }else{
            return array();
        }
    }
   
           
}
?>