<?php
class InventarioCompo extends CApplicationComponent
{
    private $_model=null;
    private $_fechainicio;
    private $_fechafin;

   private function setModel()
    {
        if(!$this->_model){
            $objetito=Periodos::model()->findByAttributes(array('activo'=>'1'));
        if(is_null($objetito))
            throw new CHttpException(500,__CLASS__.'   No se ha activado nigun periodo ');
       if  (!$this->HoyDentroDe($objetito->inicio,$objetito->final))
           throw new CHttpException(500,__CLASS__.'  La fecha actual no se encuentra dentro del periodo activo ');
          $this->_model=$objetito;
          }
        return  $this->_model;
    }

    public function getModel()
    {
         $this->setModel();
              return $this->_model;
    }



   /*  verificA QUE FECHA 1 SEA MENOR QUE FECHA2
   */
    public function verificaFechas($fechaini,$fechafin,$puedeserigual=null)
    {
       $fechafin=date('Y-m-d',strtotime($fechaini.''));
        $fechaini=date('Y-m-d',strtotime($fechaini.''));

      if( strtotime($fechaini.'')  > strtotime($fechafin.'')){

          return false;
      } else {

           return true;
      }

    }

    /*  verificA QUE FECHA 2 ESTE DENTRO
     DE  FECHA 1 Y FECHA 3
  */

    public function estadentrodefechas($fecha1,$fecha2,$fecha3){
        $retorno=false;
         if($this->verificaFechas($fecha1,$fecha2))
            if($this->verificaFechas($fecha2,$fecha3))
             $retorno=true;
        return $retorno;

    }

  /*vERIFICA QUE LÑA FECHA ACTUAL ESTA DENTRO DE LA FECHAIN Y LA FECHAFIN*/

   public function HoyDentroDe($fechaini,$fechafin)
    {

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



public function estadentroperiodo($fecha){
    $fecha=date('Y-m-d',$fecha);
    $modelperiodoactivo=$this->getModel();
   return  $this->estadentrodefechas($modelperiodoactivo->inicio,$fecha,$modelperiodoactivo->final);

}


    public function diasentre($fecha1,$fecha2){

        if(!$this->verificaFechas($fecha1,$fecha2))
        throw new CHttpException(500,__CLASS__.'   Fechas inconsistentes ');
        $difdias=round((strtotime($fecha2.'')  - strtotime($fecha1.''))/(60*60*24),2);
        return  $difdias;

    }




}
?>