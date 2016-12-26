<?php  class CDbMapExresiones extends CDbExpression
//ESTA CLASE PROVEE METODOS PARA ARMAR SENTENCIAS SQL 
//con funciones de calculo fuera del estandar SQL -ANSI 
//COMO IF, ISNULL, COALESCE, TIMEDIFF...etc 
//que se diferencian en cada motor de datos : Mysql, postgres, Oracle
//la idea de este compoentne es armar estas expresiones sin llegar 
//a error abstrayendo para cada motor de datos que use la aplicaicon
{

   private $_driver;
   public $aexpresiones=array();
   
   public function __construct(){
       $this->aexpresion=array(
           'IF'=>array(),
           
           
           
       );
  }
   public function getDriver(){
       $this->_driver=yii::app()->db->getDriverName();
   }
   
   public aexpresiones()
   
   
       $dri=
        //revisar la propeiedad     " yii::app()->db->driverMap"  que contiene las abreciatua de odoas las bases de datos
         $expresion="";
        switch ( $dri ){
                case "mysql":
                    
                        $expresion=" COALESCE(".$expresion1.",".$expresion2." )";
                    
                    
                    break;
                case "pgsql":
                 $expresion=" COALESCE(".$expresion1.",".$expresion2." )";
                    break;
                case "image/png":
                    throw new CHttpException(500,__CLASS__."---".__FUNCTION__." No se encontraron expresiones apra este tipo de MOTOR DE BASE DE DATPOS  ".$dri);
      break;
                default:
                    throw new CHttpException(500,__CLASS__."---".__FUNCTION__." No se encontraron expresiones apra este tipo de MOTOR DE BASE DE DATPOS  ".$dri);
     
                    break;
            }
    
	
}