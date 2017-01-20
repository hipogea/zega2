<?php
class ImpuestosCompo extends CApplicationComponent
{
private $_valor;
    private $_modelo=null;

    public function __construct() {
        $this->_modelo='Valorimpuestos';

    }
  public function getImpuesto($codimpuesto,$fecha=null){
      if(is_null($fecha)){
          $fecha=date('Y-m-d');
          $criterio=New CDBCriteria();
      $criterio->addCondition("activo='1' and hcodimpuesto=:vcodimpuesto");
      $criterio->addCondition("ffinal >= :vfecha AND finicio <= :vfecha ");
      $criterio->params=array(":vfecha"=>$fecha,":vcodimpuesto"=>$codimpuesto);
      }else{
          $fecha=date('Y-m-d',strtotime($fecha));
          $criterio=New CDBCriteria();
      $criterio->addCondition(" hcodimpuesto=:vcodimpuesto");
      $criterio->addCondition("ffinal >= :vfecha AND finicio <= :vfecha ");
      $criterio->params=array(":vfecha"=>$fecha,":vcodimpuesto"=>$codimpuesto);
      }

      
      $modelo=$this->_modelo;
      //var_dump($modelo::model()->find( $criterio)->attributes);yii::app()->end();
      $this->_valor=$modelo::model()->findAll( $criterio)[0]->valor;
     if( is_null($modelo::model()->findAll( $criterio)[0]))
         throw new CHttpException(500,'No se pudo encontrar el valor del impuesto para esta fecha');
   return  $this->_valor/100;
  }

    private function verificafechas($codimpuesto){


}

    public function borraplantilla($iddocu,$codocu,$codimpuesto){
        /***********************************
         * Esta funcion borra la plantilla de impuestos  IMPUESTOSDOCUAPLICADOS
         * para un determinado documento puede ser una OC o una FACTURA
         * X EJEMPLO para la OC NUMERO 210000567 , toca registrar
         *    codimpuesto
         *    codocu
         *    iddocu
         *    idvalorimpuesto    !... IMPORTANTE  ESTE ID SE SACA DE LA TABLA "Vavlorimpuestos"  con el valor del impuesto vigente
         *                        esto es importante para que no suceda de que cuando cambia el impuesto con el tiempo
         *                        y se quiere sacar el valor de los impuestos , se saque con el id de impuesto
         *                        actualizado, por el contrario el sistema buscará el valor verdadero del impuesto
         *                       según la fecha del documento
         ************************************/
        $registro=Impuestosaplicados::model()->find($this->criter($iddocu,$codocu,$codimpuesto));
        if(!is_null($registro)){
            return $registro->delete();}else{
                return false;
            }

        }




    private function criter($iddocu,$codocu,$codimpuesto){
        $criterio=New CDBCriteria();
        $criterio->addCondition('codimpuesto=:vcodimpuesto AND codocu=:vcodocu AND iddocu =:viddocu and idstatus>=0 and idusertemp=:vuser');
        $criterio->params=array(
            ':vcodimpuesto'=>$codimpuesto,
            ':vcodocu'=>$codocu,
            ':viddocu'=>$iddocu,
            ':vuser'=>yii::app()->user->id,
        );
        return $criterio;
    }

    private function  criterdoc ($iddocu,$codocu){
        $criterio=New CDBCriteria();
        $criterio->addCondition(' codocu=:vcodocu AND iddocu =:viddocu ');
        $criterio->params=array(
            ':vcodocu'=>$codocu,
            ':viddocu'=>$iddocu,
        );
        return $criterio;
             }

    public function insertaplantilla($iddocu,$codocu,$codimpuesto){
        /***********************************
         * Esta funcion permite registrar la plantilla de impuestos  IMPUESTOSDOCUAPLICADOS
         * para un determinado documento puede ser una OC o una FACTURA
         * X EJEMPLO para la OC NUMERO 210000567 , toca registrar
         *    codimpuesto
         *    codocu
         *    iddocu
         *    idvalorimpuesto    !... IMPORTANTE  ESTE ID SE SACA DE LA TABLA "Vavlorimpuestos"  con el valor del impuesto vigente
         *                        esto es importante para que no suceda de que cuando cambia el impuesto con el tiempo
         *                        y se quiere sacar el valor de los impuestos , se saque con el id de impuesto
         *                        actualizado, por el contrario el sistema buscará el valor verdadero del impuesto
         *                       según la fecha del documento
         ************************************/

$mensaje="";
        $registro=Tempimpuestosdocuaplicados::model()->find($this->criter($iddocu,$codocu,$codimpuesto));

        if(is_null($registro)){
            $modelo=new Tempimpuestosdocuaplicados();
            $modelo->setAttributes(array(
                'codimpuesto'=>$codimpuesto,
                'codocu'=>$codocu,
                'iddocu'=>$iddocu,
                'valorimpuesto'=>$this->getImpuesto($codimpuesto)+0,
                'idstatus'=>1,
                'idusertemp'=>yii::app()->user->id,
            ));
           // var_dump($modelo->valor)
            if(!$modelo->save()){
                $mensaje='hubo un error al b grabar';

            }else{
                $mensaje='';
               }


        }else{
           $mensaje='ya habi uno con esos valores';

        }

        return $mensaje;
    }

    private function criterdoci ($iddetalle,$iddocu,$codocu,$codimpuesto){
        $criterio=New CDBCriteria();
        $criterio->addCondition('codimpuesto=:vcodimpuesto AND hidocu=:viddetalle AND  codocu=:vcodocu AND hidocupadre =:viddocu ');
        $criterio->params=array(
            ':vcodocu'=>$codocu,
            ':viddocu'=>$iddocu,
            ':viddetalle'=>$iddetalle,
            ':vcodimpuesto'=>$codimpuesto,

        );
        return $criterio;
    }


public function colocaimpuestos($iddetalle,$iddocu,$codocu,$codmon,$monto){
    /************************************
     * Esta funcion coloca los impuestos a un registro hijo de
     * un documento
     * iddetalle: el ID del registro hijo
     * iddocu  : El id del documento
     * codocu: El codocu del documento
     *
     **************************************/

    ///primero verificamos que no haya ningun impuesto que este dentro de la cabecer adel domeumento
  $varios=Impuestosdocuaplicado::model()->findAll($this->criterdoc($iddocu,$codocu));
   // print_r($varios);yii::app()->end();
    foreach($varios as $fila){
      $filaimpuesto=Impuestosaplicados::model()->find($this->criterdoci($iddetalle,$iddocu,$codocu,$fila->codimpuesto));
        if(is_null($filaimpuesto)){
            $filaimpuesto=New Impuestosaplicados();
            //echo "salio nuevo ".$filaimpuesto->id."  <br>";
        }
        $filaimpuesto->setAttributes(array(
            'codimpuesto'=>$fila->codimpuesto,
            'codocu'=>$codocu,
            'hidocupadre'=>$iddocu,
            'hidocu'=>$iddetalle,
            'codmon'=>$codmon,
            'valor'=>$this->getImpuesto($fila->codimpuesto)*$monto,
        ));
       //echo " impuesto :". $fila->codimpuesto." <br>";
       // print_r($filaimpuesto->attributes);
       // echo " cambio  <br><br><br>";
        $filaimpuesto->save();
          //  print_r($filaimpuesto->geterrors());yii::app()->end();

    }
  //  ;yii::app()->end();

}

    private function criterimp($codocu,$idocu){
        $criterio=New CDBCriteria();
        $criterio->addCondition('hidocupadre=:vidocu AND  codocu=:vcodocu ');
        $criterio->params=array(
            ':vcodocu'=>$codocu,
            ':vidocu'=>$idocu,
        );
        //$criterio->with = array('Impuestos');
        //$criterio->select = 't.descripcion, t1.valor';
        $criterio->group="x.simbolo, a.codimpuesto,a.descripcion,b.codmon,c.valor,a.abreviatura";
        return $criterio;
    }


    /******
     * funcioque regresa un data provider de datos de impñuestos para un domcuento especificado
     */
public function dataimpuestos($codocu,$idocu){
    $cr=$this->criterimp($codocu,$idocu);
    $rawData=Yii::app()->db->createCommand()
        ->select('a.descripcion,c.valor,a.abreviatura,sum(b.valor) as valorap ,x.simbolo')
        ->from('{{impuestos}} a ')
        ->join('{{impuestosaplicados}} b', 'a.codimpuesto=b.codimpuesto')
        ->join("{{valorimpuestos}} c", "c.hcodimpuesto=a.codimpuesto AND activo='1'")
        ->join("{{monedas}} x", "x.codmoneda=b.codmon")
        ->where($cr->condition, $cr->params)
        ->group($cr->group)
        ->queryAll();
  //return  $rawData;

return new CArrayDataProvider
        ($rawData,
            array(
                'sort'=>array(
                'attributes'=>array(
                                'descripcion', 'abreviatura','valor','codmon','simbolo', 'valorap',
                                    ),
                            ),

                    )
        );
}

   private function criterdelete($iddetalle,$idocupadre,$codocu){
       $cri=New CDBCriteria();
       $cri->addCondition("hidocu=:viddetalle AND codocu=:vcodocu AND hidocupadre=:vhidocupadre");
       $cri->params=array(":viddetalle"=> $iddetalle,":vcodocu"=>$codocu,":vhidocupadre"=>$idocupadre);
       RETURN $cri;
   }

public function borraimpuestos($iddetalle,$idocupadre,$codocu){

    Impuestosaplicados::model()->deleteAll($this->criterdelete($iddetalle,$idocupadre,$codocu));
    return true;
}


}
?>