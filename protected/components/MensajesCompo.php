<?php
class MensajesCompo extends CApplicationComponent
{
    const NOMBRE_SESION='errores';
    private $_modelo=null;
    private $_tabla=null;
    private $_sesion=null;
   // private $_fechainicio;
   // private $_fechafin;
    public function __construct() {
      // if(!isset(yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id][$codocu]))
          //  yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id][$codocu]=array();
       // if(isset( yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id]))
               // yii::app()->session[self::NOMBRE_SESION][$codocu][yii::app()->user->id][0]=array();
              //  yii::app()->session[self::NOMBRE_SESION][$codocu][yii::app()->user->id][self::CABECERA]=array();

       // parent::__construct();
      /*  $this->_modelo='Maletin';
        $registro=new $this->_modelo;
        $nombretabla=$registro->tablename();
        $this->_tabla=$nombretabla;
        $elusuario=Yii::app()->user->um->LoadUserById(yii::app()->user->id);
        $sesion_activa=Yii::app()->user->um->findSession($elusuario);
        $this->_sesion=$sesion_activa->idsession;
        unset($registro);unset($sesion_activa);unset($elusuario);*/
  $this->_modelo='Mensajes';
    }


  /*Coloca los mensajes para un detreminado item de un domcumento como la factura o OC
    eSTO QUIERE DECIR QUE PARA UN MISMO ITEMN PUEDE HABER VARIOS ERRORES  y se deben de almacenar
    en un array

  $codocu: El documento PADRE
  $iddocu: El id del item ,
  $mensaje : mensaje
  $nivel:  'error', 'success', 'notice';
  */
    public function setmessageitem($codocu,$iddocu,$mensaje,$nivel) {
        /*if(!isset(yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id][$codocu]))
            yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id][$codocu]=array();
        yii::app()->session[self::NOMBRE_SESION][yii::app()->user->id][$codocu][$iddocu][$nivel].=$mensaje."<br>";*/
        if(!isset($_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu]))
            $_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu]=array();
        $_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu][$iddocu][$nivel][]=$mensaje."<br>";

    }

  /* Funcion que lee los errores de n registro modelo  (funcion geterrors())
  *   Y los porcesa en forma de cadena para mostrarlos
   *   $errores: array('campo'=>array(0=>'Debe de ser entero', 1=>'NO NULO' ...), 'campo1'=>array());
   * */

    public function getErroresItem($errores){
        $mensajeitem="";
          foreach($errores as $campo=>$arrayerroresdecampo){
              $mensajeitem.="    ".$campo." : ";
                foreach($arrayerroresdecampo as $clave=>$valor){
                    $mensajeitem.=$valor;
                }
              $mensajeitem.="<br>";

          }
        return $mensajeitem;
    }

    public function getMessages($codocu){
      return $_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu];


    }
    public function clear(){
       $_SESSION[self::NOMBRE_SESION]=array();


    }


    public function hayerrores($codocu){
        if(count($_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu])>0)
            return $_SESSION[self::NOMBRE_SESION][yii::app()->user->id][$codocu];
        return null;

    }

    /***************************
     * Esta funcion guarda un registro en la tabla {{mensajes}} para saber que o quien
     * ha mandado un correo o impreso o vista previa de la impresion
     * de documentos
     **************************/

public function auditoriamensajes($codocu,$hidocu,$fichero=null,$tipo=null){
    $modelo=$this->creamodelo();
    $modelo->setAttributes(
        array(
            'usuario'=>Yii::app()->user->um->loadUserById(yii::app()->user->id)->username,
             'cuando'=>date('Y-m-d H:m:s'),
            'codocu'=>$codocu,
            'nombrefichero'=>$fichero,
            'tipo'=>$tipo,
            'hidocu'=>$hidocu
        )
    );
    $modelo->save();
    unset($modelo);
}

    private function creamodelo(){
      Return  new $this->_modelo;

    }


}
?>