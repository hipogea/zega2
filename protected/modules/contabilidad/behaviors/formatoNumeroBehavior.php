<?php
/**
 * Behavior que gestiona la relacion con las tablas sunat 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
class formatoNumeroBehavior extends CActiveRecordBehavior
{
    
    /**
 * Funciom que devuelve el numero de documento, 
     * rellenando con ceros hasta aclcanzar el formato adecuado 
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
    public function rellenaNumero($patron,$numero)
    {       
     //var_dump($patron);die();
        //limpiando el 
       // $numero=$this->limpia(trim($numero));
        //var_dump($numero);die();
        $longitud=$this->longitud($patron);    
       //var_dump($longitud);
      // var_dump($numero);
        //die();
        $numero= substr( str_pad($numero, $longitud, "0", STR_PAD_LEFT), -1*$longitud,$longitud);
       
       return $numero;
     }
     
     
     
    private function limpia($numero){
        return preg_replace(
                        array('/[^0-9]{1}/','/[^A-Z]{1}/') , 
                        array('','') , 
                        $numero  
               );
    }
    
    private function longitud($patron){
           for ($i = 1; $i <= 99; $i++) {
                 if(preg_match("/".$patron."/", str_pad('', $i, "0", STR_PAD_LEFT)))
                         break;
                }        
            return $i;
    }
    
    
    public function esfechacontable($idperiodo, $nombrecampofecha){
        
       return  yii::app()->periodo->estadentroperiodo(
                $this->owner->{$nombrecampofecha},false,$idperiodo
                );
        
        
      
        
    }
    
}