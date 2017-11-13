<?php

/**********************************************
 * Class MaletinCompo
 *
 * Almacena valores selccionados por el usuario en los diversos
 * documentos de la interfaz de la aplicacion.  La fialidad es
 * eviar usar sesioens de PHP, ENLUGAR DE ESTO APROVECHA LAS SESIONES
 * DE USUARIO DE CRUGE. Encapsula el trabajo de sacar y guradar datos
 * mientras dure la sesion de usuario*
 *
 *
 ***************************************************/


class MaletinCompo extends CApplicationComponent
{
    private $_modelo=null;
    private $_tabla=null;
    private $_sesion=null;
   // private $_fechainicio;
   // private $_fechafin;
    public function __construct() {

       // parent::__construct();
        $this->_modelo='Maletin';
        $registro=new $this->_modelo;
        $nombretabla=$registro->tablename();
        $this->_tabla=$nombretabla;
        $elusuario=Yii::app()->user->um->LoadUserById(yii::app()->user->id);
        $sesion_activa=Yii::app()->user->um->findSession($elusuario);
        $this->_sesion=$sesion_activa->idsession;
        unset($registro);unset($sesion_activa);unset($elusuario);

    }

    public function flush() {
        $criteria=New CDBcriteria();
        $criteria->addCondition(" iduser=".yii::app()->user->id."");
       yii::app()->db->createCommand()->delete($this->_tabla,$criteria->condition,array());
        unset($criteria);
    }

    public function flushtotal() {


        yii::app()->db->createCommand()->delete($this->_tabla,array(),array());

    }

    public function ponervalores($arrayvalores,$codocu=null) {
        if(is_array($arrayvalores)){
                foreach($arrayvalores as $clave=>$valor ){

                        $this->insertafila($clave,$valor,$codocu);


                }

        }else{

        }

    }

    public function getvalues($clase){
        $clase=MiFactoria::cleanInput($clase);
       return  yii::app()->db->createCommand()->select('idregistro,clase,codocu')->from($this->_tabla)->where(
            "clase=:vclase AND iduser=".yii::app()->user->id." AND idsession=".$this->_sesion." ",
            array(":vclase"=>$clase)
        )->queryAll();
    }

    public function getallvalues(){
        //$clase=MiFactoria::cleanInput($clase);
        return  yii::app()->db->createCommand()->select('idregistro,clase,codocu')->from($this->_tabla)->where(
            " iduser=".yii::app()->user->id." AND idsession=".$this->_sesion." ",
            array()
        )->queryAll();
    }

/*esta fuincion devuelve un registro ACTIVE RECORD , con
solo pasar los valores almacendaos en el  maletin
  $clase: NOmbre de la clase del modelo
  $id:  clave principal
 Si no encue ntrsa devbuelve null
*/
    public function getregistroclase($clase,$id){
        $clase=MiFactoria::cleanInput($clase);
        $id=(int)MiFactoria::cleanInput($id);
         if($this->existefila($id,$clase)){
             $nombremod=$this->_modelo;
            return  $nombremod::model()->findByPk($id);
         }else {
           return  null;
         }
    }

/*veriofica si exist3e una regiusto en el maletin

*/
    public function existefila($id,$clase){
        $clase=MiFactoria::cleanInput($clase);
        $id=(int)MiFactoria::cleanInput($id);
        $criteria=New CDBcriteria();
        $criteria->addCondition("idregistro=:idregistro AND clase=:vclase AND iduser=".yii::app()->user->id." AND idsession=".$this->_sesion." ");
        $criteria->params=array(":vclase"=>$clase,":idregistro"=>$id);
        $nombremod=$this->_modelo;
      /*  var_dump($clase);var_dump($id);var_dump($criteria);
       var_dump( Maletin::model()->find($criteria));yii::app()->end();*/
       return is_null( $nombremod::model()->find($criteria))?false:true;

    }
    
    public function borrafila($id){
        
        $id=(int)MiFactoria::cleanInput($id);       
        $filas=yii::app()->db->createCommand()->delete($this->_tabla,
                "id=:idregistro and iduser=".yii::app()->user->id." ",
                array(":idregistro"=>$id)
                );
     return $filas;

    }
    
    
    
    public function insertafila($id,$clase,$documento=null){
       if(!$this->existefila($id,$clase)){
           $maletin=new $this->_modelo;
           $maletin->setAttributes(
               array(
                   'idregistro'=>$id,
                   'clase'=>MiFactoria::cleanInput($clase),
                   'codocu'=>is_null($documento)?null:$documento,
               )
           );
          if( !$maletin->save())
          {echo "error ";print_r($maletin->geterrors());yii::app()->end();}
       }

    }

public function cuantoshay(){
   return  yii::app()->db->createCommand()->select('count(id)')->from($this->_tabla)->where(
            " iduser=".yii::app()->user->id."  ",
            array()
        )->queryScalar(); 
}

public function valoresid($codigodoc){
    return  yii::app()->db->createCommand()->
            select('idregistro')->
            from($this->_tabla)->
            where(
            "iduser=".yii::app()->user->id." AND codocu=:vcodocu  AND idsession=".$this->_sesion,
            array(":vcodocu"=>$codigodoc)
        )->queryColumn();
    
    
    
   return  yii::app()->db->createCommand()->select('count(id)')->from($this->_tabla)->where(
            " iduser=".yii::app()->user->id."  ",
            array()
        )->queryScalar(); 
}

}
?>