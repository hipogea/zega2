<?php
/**
 * Behavior que gestiona las fotos , toma fotros y las agurada
 * 
 *
 * @author Julian Ramirez neotegnia@gmail.com
 * @version 1.0.0
 * 
 */
class TomaFotosBehavior extends CActiveRecordBehavior
{
    
public $_codocu=null;
public $_id=null;
public $_numerofotosporcarpeta=null;
public $_ruta=null;
public $_rutabas=null;
public $_carpetadestino=null;
public $_extensionatrabajar=null;


private function prepara() {
     //$this->_codocu=$vcodocu;
      IF(substr( $this->_extensionatrabajar,0,1)=='.')
                         $this->_extensionatrabajar=  substr ( $this->_extensionatrabajar,1);
    
           $this->_rutabas=Yii::getPathOfAlias('webroot').$this->_ruta;  
           //var_dump( $this->_rutabas);die();
             $this->_carpetadestino= $this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar.DIRECTORY_SEPARATOR.trim((string)ceil($this->_id/$this->_numerofotosporcarpeta)).DIRECTORY_SEPARATOR;
        
                   
}



 //Define 
    private function existecarpetabase(){
        
        if (is_dir($this->_rutabas)) {
               return  true;               
            } else {
               return false;
                }
       
    }
    
    private function existecarpetadocu(){
        
        if (is_dir($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu)) {
               return  true;               
            } else {
               return false;
                }
       
    }
    
    private function existecarpetaextension(){
        
        if (is_dir($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar)) {
               return  true;               
            } else {
               return false;
                }
       
    }
    
    public function creacarpetabase(){
             //$filename=Yii::getPathOfAlias('webroot').$this->_ruta;
        $this->prepara();
        if($this->existecarpetabase()){
            return true;
        }else{
              if(mkdir($this->_rutabas, 0777)){
                  return true;
              }else{
                  return false;
              }
                
        }
    }
    
    
    public function creacarpeta(){
       //var_dump($this);die();
       ///primero verificando sio exisgte la carpeta raiz
        $this->prepara();
         $nombrec= trim((string)ceil($this->_id/$this->_numerofotosporcarpeta)).DIRECTORY_SEPARATOR;
        // var_dump($nombrec);die();
       if($this->existecarpetabase()){
           //echo "caray";
                        if($this->existecarpetadocu()){
                                     if($this->existecarpetaextension()){
                                                  if (is_dir($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar.DIRECTORY_SEPARATOR.$nombrec))
                                                                                                {
                                                                                                         return true;
                                                                                                }else{
                                                                                                             if(mkdir($this->_carpetadestino,0777)){
                                                                                                                     $this->creacarpeta();
                                                                                                               }else{
                                                                                                                    return false;
                                                                                                                } 
                                                                                                    }
                                                                        
                    
                                                                    
                                                }else{
                                                   // Yii::log(' ejecutandosfssfsfsfs '.$this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar,'error');
                                                  // var_dump($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar);die();
                                                    if(mkdir($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar,0777)){
                                                                                     $this->creacarpeta();
                  //$this->_carpetadestino=$ruta.DIRECTORY_SEPARATOR;
                                                                                                 }else{
                                                                                                            return false;
                                                                                                    } 
                                                      
                                                }
                                    } else {
                                        if(mkdir($this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu, 0777)){
                                                                                     $this->creacarpeta();
                  //$this->_carpetadestino=$ruta.DIRECTORY_SEPARATOR;
                                                                                                 }else{
                                                                                                            return false;
                                                                                                    } 
                                        
                                    }
      
        }else{
           if( $this->creacarpetabase()){
               $this->creacarpeta();
           }else{
              return false; 
           }
            
        }
       
               
    }
    
    public function colocaarchivo($fullFileName) {
        
        $fullFileName=$this->limpiaruta($fullFileName);
         Yii::log(' okix  '.serialize($fullFileName),'error');
         //die();
        $filename=$fullFileName;
          //var_dump($filename);die();
        $this->prepara();
        $this->creacarpeta();
        // var_dump($filename);
        if(strtolower(trim($this->extension($filename)))==strtolower(trim($this->_extensionatrabajar)) or 
                strtolower(trim($this->extension($filename)))=='tmp'
                )
           {
           // $this->creacarpeta();
          IF (is_file($filename)) {
            // var_dump($filename);
              $nombrec= trim((string)ceil($this->_id/$this->_numerofotosporcarpeta)).DIRECTORY_SEPARATOR;
       $ruta=$this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar.DIRECTORY_SEPARATOR.$nombrec;
      // var_dump($ruta);
      //  var_dump($this->colocanombre());die();
             if(copy($filename,$ruta.$this->colocanombre())){
                 var_dump($ruta.$this->colocanombre());die();
                  yii::log('error','jajaja  se pudo copiar con la funcion copy  : '.$filename.'  ,  '.$ruta.$this->colocanombre());
                 return true;
             }else{
                   var_dump($ruta.$this->colocanombre());die();
                 yii::log('error','no se pudo copiar con la funcion copy  : '.$filename.'  ,  '.$ruta.$this->colocanombre());
                 return false;
             }
          }else{
               yii::log('error','pucha se pudo copiar con la funcion copy  : '.$filename.'  ,  '.$ruta.$this->colocanombre());
              return false;
          }
       }else{
            throw new CHttpException(500,
                    __CLASS__.'  '.__FUNCTION__.'    => '
                    . 'La extension del archivo ['.$filename.']    ---->  "'.strtolower(trim($this->extension($filename))).'"   '
                    . 'no coincide con las extension "'.$this->_extensionatrabajar.'"');
			
        }
    }
    
    private function extension($nombrearchivo){
        //echo $nombrearchivo;die();
        return strtolower(trim(strrev(substr(strrev($nombrearchivo),0,3))));
    }
    
    private function colocanombre(){
       
            return $this->_id."_".((microtime(true))*10000)."_".yii::app()->user->id.".".$this->_extensionatrabajar;
       
       
    }
    
    public function recuperaarchivos($rutasabsolutas){
        $this->creacarpeta();
        $archivos= CFileHelper::findFiles(
                $this->_carpetadestino,
               array('fileTypes'=>array($this->_extensionatrabajar),
		'exclude'=>array(),
                'level'=>0,
                'absolutePaths'=>$rutasabsolutas,
                ));
        $archivosfiltrados=array();
        foreach($archivos as $clave=>$nombre)
            {
            //var_dump(strpos($nombre,$this->_id.'_'));
                     
                         if(strpos($nombre,$this->_id.'_')>=0){
                                                        
                             if(substr($nombre,strpos($nombre,$this->_id.'_'),strlen(trim($this->_id)))===trim($this->_id))
                             //$archivosfiltrados[]=substr($nombre,strpos($nombre,$this->_id.'_'),strlen(trim($this->_id)));
                                     if($rutasabsolutas){
                                        // $archivosfiltrados['rutalarga']=$this->_carpetadestino.substr($nombre,strpos($nombre,$this->_id.'_'));
                                       $nombrearchivo=$this->_carpetadestino.substr($nombre,strpos($nombre,$this->_id.'_'));                                      
                                       $archivosfiltrados[]=$this->limpiaruta($nombrearchivo);                                        
                                         
                                     }else{
                                        // $archivosfiltrados[]=$this->rutarelativa().$nombre;
                                         $nombrearchivo=$this->rutarelativa().$nombre;
                                     }
                                     $nombrearchivo=$this->limpiaruta($nombrearchivo);
                                     $datosruta=  pathinfo($nombrearchivo);
                                     
                                              $archivosfiltrados[]=array(
                                                  'nombre'=>$datosruta['filename'],
                                                  'extension'=>$datosruta['extension'],
                                                  'subidopor'=>$this->getquiensubio($nombre),
                                                  'subidoel'=>$this->getcreado($nombre),
                                                  'tamano'=>$this->getSize($nombrearchivo),
                                                  'rutacorta'=>($rutasabsolutas)?trim($this->rutarelativa(),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR:trim($this->limpiaruta($datosruta['dirname']),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR,
                                                   'rutalarga'=>($rutasabsolutas)?$this->limpiaruta(trim($datosruta['dirname'],DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR):
                                                  $this->limpiaruta(trim(Yii::getPathOfAlias('webroot'))).
                                                  $this->limpiaruta($this->rutarelativa()),
                                                                                        
                                              );
                                      
                                }
                            
                                   
             }
             
             
        
        return $archivosfiltrados;
        
    }
    
    public function borraarchivos(){
        $this->prepara();
                
        foreach($this->recuperaarchivos(true) as $archivo ){
            unlink($archivo);
        }
        
        
        
    }
    
    public function borraarchivo($nombrecorto){
        unlink($this->_carpetadestino.$nombrecorto);
        }
    
    public function getcreado($nombrecorto){
        $aparts=explode("_",$nombrecorto);
        
        return date("Y-m-d H:i:s",$aparts[1]/10000);
    }
    public function getquiensubio($nombrecorto){
        $aparts=explode("_",$nombrecorto);
        
        return strrev(substr(strrev($aparts[2]),4));
    }
    
    public function getSize($archivo){
        
        $archi= CFile::getInstance($archivo);
        return $archi->getSize('0.00');
    }
    
    public function getauditoria(){
        $audi=array();
        
        foreach($this->recuperaarchivos(false) as $clave=>$nombre){
            $nombrearch=substr($nombre,strpos($nombre,$this->_id.'_'));
            $audi[$nombrearch]['nombre']=$nombrearch;
            $audi[$nombrearch]['creado']=$this->getcreado($nombrearch);
             $audi[$nombrearch]['subidopor']=$this->getquiensubio($nombrearch);
        }
        return $audi;
    }
    
    
    
    public function getulpoaddirectory(){
        //echo rtrim($this->_ruta,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR; die();
        return rtrim($this->_ruta,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
    }
    
    private function rutarelativa(){
        $this->prepara();
         $cadena= rtrim(yii::app()->baseUrl,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.
             rtrim( $this->_ruta,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.
              rtrim($this->_codocu,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.
              rtrim($this->_extensionatrabajar,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.
                 trim((string)ceil($this->_id/$this->_numerofotosporcarpeta),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
       // $cadena=$this->limpiaruta($cadena);
        
        return $cadena;
     
    }
    
    private function limpiaruta ($cadena){
           $varso=strtolower($_SERVER['HTTP_USER_AGENT']);
           //yii::log('yii   es lerroe '.$cadena,'error');
           $cadena=str_replace ( "/" ,DIRECTORY_SEPARATOR , $cadena );
           // yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( "\\" ,DIRECTORY_SEPARATOR , $cadena );
         //yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( "//" ,DIRECTORY_SEPARATOR , $cadena );
         //yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( "\\\\" ,DIRECTORY_SEPARATOR , $cadena); 
        // yii::log('yii   es lerroe '.$cadena,'error');
       if(strpos($varso,'windows')>=0){ //si e swindows
              $cadena=str_replace ( "\\" ,"/" , $cadena);
               //yii::log('yii   si es window '.$cadena,'error');
              }else{
                  
              }
              return $cadena;
    }
    
}