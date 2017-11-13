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
public $_id=null; ///Es elo id  del registro
public $_numerofotosporcarpeta=null; ///NUmero de fotos por carpeta este valor no varia para nada , es un parametro  nada es parte de la configruacion general del sisitema
public $_ruta=null;
public $_rutabas=null;
public $_carpetadestino=null;
public $_extensionatrabajar=null;
public $_nombrearchivopredef=null;


private function prepara() {
     //$this->_codocu=$vcodocu;
    if(is_null($this->_ruta)) throw new CHttpException(500,__FUNCTION__.'   '.__LINE__.'  NO ha definido la propiedad RUTA de esta clase  '. get_class($this));

      IF(substr( $this->_extensionatrabajar,0,1)=='.')
                         $this->_extensionatrabajar=  substr ( $this->_extensionatrabajar,1);
    
        if(is_null($this->_rutabas))   
      $this->_rutabas=Yii::getPathOfAlias('webroot').$this->_ruta;  
           //var_dump( $this->_rutabas);die();
           if(is_null($this->_carpetadestino))
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
    
  public function getCarpeta (){
      if(is_null($this->_carpetadestino))
          $this->prepara ();
      return $this->_carpetadestino;
      
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
         //die();
        $filename=$fullFileName;
          //var_dump($filename);die();
        $this->prepara();
        $this->creacarpeta();
        // var_dump($filename);
        if(strtolower(trim($this->extension($filename)))==strtolower(trim($this->_extensionatrabajar)) or 
                strtolower(trim($this->extension($filename)))=='tmp' or 
               in_array( strtolower(trim($this->extension($filename))),array('gif','png','jpeg') ) 
                )
           {
           // $this->creacarpeta();
          IF (is_file($filename)) {
              if(in_array( strtolower(trim($this->extension($filename))),array('gif','png','jpeg')))
              $filename=$this->FileReceptor($filename);
             
               // var_dump($filename);
               Yii::log(' el  id    : '.serialize($this->Owner),'error');
              $nombrec= trim((string)ceil($this->_id/$this->_numerofotosporcarpeta)).DIRECTORY_SEPARATOR;
       $ruta=$this->_rutabas.DIRECTORY_SEPARATOR.$this->_codocu.DIRECTORY_SEPARATOR.$this->_extensionatrabajar.DIRECTORY_SEPARATOR.$nombrec;
      // var_dump($ruta);
      //  var_dump($this->colocanombre());die();
        Yii::log(' ya llegamos    '.serialize($fullFileName),'error');
            Yii::log(' el filenama    '.$filename,'error');
             if(copy($filename,$ruta.$this->colocanombre())){
                 $this->insertaregistro($ruta.$this->colocanombre());
                 //var_dump($ruta.$this->colocanombre());die();
                   @unlink($filename);
                 yii::log('jajaja  se pudo copiar con la funcion copy  : '.$filename.'  '.$ruta.$this->colocanombre(),'error');
                 return $ruta.$this->colocanombre();
             }else{
                  @unlink($filename);
                   //var_dump($ruta.$this->colocanombre());die();
                 yii::log(' no se pudo copiar con la funcion copy  : '.$filename.'  '.$ruta.$this->colocanombre(),'error');
                 return false;
             }
          }else{
               @unlink($filename);
               yii::log('error',' la ruta   : '.$filename.'    no es un archivo  ');
              return false;
          }
           @unlink($filename);
       }else{
            @unlink($filename);
            throw new CHttpException(500,
                    __CLASS__.'  '.__FUNCTION__.'    => '
                    . 'La extension del archivo ['.$filename.']    ---->  "'.strtolower(trim($this->extension($filename))).'"   '
                    . 'no coincide con las extension "'.$this->_extensionatrabajar.'"');
			
        }
       
    }
    
    private function extension($nombrearchivo){
        //echo $nombrearchivo;die();
        $posic=strpos(strrev($nombrearchivo),'.');
       return substr($nombrearchivo,strlen($nombrearchivo)-$posic);
        //return strtolower(trim(strrev(substr(strrev($nombrearchivo),0,3))));
    }
    
    private function colocanombre(){
       //  Yii::log(' estamos dentrp    '.serialize($fullFileName),'error');
        if(is_null($this->_nombrearchivopredef)){
             return $this->_id."_0_".((integer)microtime(true)*10000)."_".yii::app()->user->id.".".$this->_extensionatrabajar;
       
        }else{
            return $this->_id."_".$this->_nombrearchivopredef."_".( ((microtime(true))*10000)    )."_".yii::app()->user->id.".".$this->_extensionatrabajar;
        
        }          
       
    }
    
    public function recuperaarchivos($rutasabsolutas){
        $this->creacarpeta(); //por si acaso se invoque esta funcion antes de 
        //que se suban archivos, nos aseguramso de crear las carperas asociadas
        $archivos= CFileHelper::findFiles(
                $this->_carpetadestino,
               array('fileTypes'=>array($this->_extensionatrabajar),
		'exclude'=>array(),
                'level'=>0,
                'absolutePaths'=>$rutasabsolutas,
                ));
         
        $archivosfiltrados=array(); //nuevo array apra guaradar los datos 
   foreach($archivos as $clave=>$archivo)
     {
       //$posic=strpos($archivo,$this->_id.'_');
     //  var_dump($this->nombrecortado($archivo));die();
       //$numeroregistro=substr($archivo,$posic,strlen(trim($this->_id)));
         if(!$rutasabsolutas){
             $nombrearchivo=$archivo;
         }else{
             $nombrearchivo=$this->getnombre($archivo);
         }
      //var_dump($this->nombrecortado($archivo));die();
       if((string)$this->_id==$this->nombrecortado($archivo)[0])
           {  
                        if($rutasabsolutas){
                                         //formar la ruta absoluta del archivo
                                       $rutaarchivo=$this->_carpetadestino.$nombrearchivo;                                      
                                         
                                     }else{
                                          $rutaarchivo=$this->rutarelativa().$nombrearchivo;
                                     }
                                     $rutaarchivo=$this->limpiaruta($rutaarchivo);
                                     $datosruta= pathinfo($this->_carpetadestino.$nombrearchivo);
                                     
                                              $archivosfiltrados[]=array(
                                                  'nombre'=>$datosruta['filename'],
                                                  'extension'=>$datosruta['extension'],
                                                  'nombrecompleto'=>$datosruta['basename'],
                                                  'directorio'=>$this->limpiaruta($datosruta['dirname']),
                                                  'subidopor'=>$this->getquiensubio($archivo),
                                                  'subidoel'=>$this->getcreado($archivo),
                                                  'tamano'=>$this->getSize($this->_carpetadestino.$nombrearchivo),
                                                  'rutacorta'=>$this->limpiaruta(DIRECTORY_SEPARATOR.trim($this->rutarelativa(),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR),
                                                  //'rutalarga'=>$this->limpiaruta(Yii::getPathOfAlias('webroot').$this->rutarelativa()),
                                                 
                                                 /* 'rutacorta'=>($rutasabsolutas)?$this->limpiaruta(
                                                  DIRECTORY_SEPARATOR.trim($this->rutarelativa(),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR):
                                                  DIRECTORY_SEPARATOR.trim($this->limpiaruta($datosruta['dirname']),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR,
                                                   'rutalarga'=>($rutasabsolutas)?
                                                  DIRECTORY_SEPARATOR.$this->limpiaruta(trim($datosruta['dirname'],DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR):
                                                  DIRECTORY_SEPARATOR.$this->limpiaruta(trim(Yii::getPathOfAlias('webroot'))).
                                                  $this->limpiaruta($this->rutarelativa()),*/
                                                                                    
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
       /* var_dump($nombrecorto);
        print_r($aparts);die();
       var_dump((integer)$aparts[1]);echo "     El nombre original <br>";
        var_dump(date("Y-m-d H:i:s",(integer)($aparts[1])));echo " La fecha con el original <br>";
        var_dump((integer)$aparts[1]/10000);echo " El marcador divido en re 10000 <br>";
         var_dump(date("Y-m-d H:i:s",(integer)($aparts[2]/10000)));echo "<br>";
        die();*/
        return date("Y-m-d H:i:s",(($aparts[2])/10000));
    }
    public function getquiensubio($nombrecorto){
        $aparts=explode("_",$nombrecorto);
        
        return strrev(substr(strrev($aparts[3]),4));
    }
    
    public function getSize($archivo){
        
        $decimals=2;
        $sz = 'BKMGTP';
        $bytes=filesize ( $archivo);
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
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
        $caracterwindows=chr(92); /// el slash de windows  "\"
            $chrstd=chr(47);/// el slash de Unix  "/"
           $varso=strtolower($_SERVER['HTTP_USER_AGENT']);
           //yii::log('yii   es lerroe '.$cadena,'error');
           $cadena=str_replace ( $chrstd ,DIRECTORY_SEPARATOR , $cadena );
           // yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( $caracterwindows ,DIRECTORY_SEPARATOR , $cadena );
         //yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( $chrstd.$chrstd ,DIRECTORY_SEPARATOR , $cadena );
         //yii::log('yii   es lerroe '.$cadena,'error');
        $cadena=str_replace ( $caracterwindows.$caracterwindows ,DIRECTORY_SEPARATOR , $cadena); 
        // yii::log('yii   es lerroe '.$cadena,'error');
       if(strpos($varso,'windows')>=0){ //si e swindows
              $cadena=str_replace ( $caracterwindows ,DIRECTORY_SEPARATOR , $cadena);
              
               //yii::log('yii   si es window '.$cadena,'error');
              }else{
                  
              }
              return $cadena;
    }
    
   public function fotosparagaleria(){
       //sca un array con informacion basica para cualquier GALLERY
        /***************************************************
         * ARRAY(
         *        array(
         *                'archivo'=>'/carpeta/julian.jpg',
         *                'texto corto'=>'Esta foto es mi favorita ...',
         *                'metadatos'=>'CREaDA: EL 10/10 POR admin ',
         *             ),
         * 
         *          array(
         *                '/carpeta/yesenia.jpg',
         *               'Esta foto es mde mi esposa ...',
         *                'CREaDA: EL 14/10 POR admin ',
         *             ),
         *       ...
         *    )  
         * 
         *************************************************/
       $fotos=$this->recuperaarchivos(false);
       $nuevoarray=array();
       $i=0;
       foreach($fotos as $foto){
           $nuevoarray[$i]['archivo']=$this->limpiaruta($foto['rutacorta'].$foto['nombrecompleto']);
           $nuevoarray[$i]['textocorto']=null;
           $nuevoarray[$i]['metadatos']=" Creado el ".$foto['subidoel']." Subido por ".yii::app()->user->um->loadUserById((integer)$foto['subidopor'])->username."  Tamano  ".$foto['tamano']."  ";
      $i++;
           }
       return $nuevoarray;
   } 
   
  public function nombrecortado($ruta){
      //encontradno la extension
      $posicion=strpos(strrev($ruta),'.');
      $ruta=substr($ruta,0,strlen($ruta)-$posicion-1);
     
       $posicion=strpos(strrev($ruta),DIRECTORY_SEPARATOR);
       if($posicion===false) ///Si es solo nombre de archivo
       {
          return explode("_",$ruta); 
       }else{
           return explode("_",substr($ruta,strlen($ruta)-$posicion));
       }
           
       
  }
  
  public function getnombre($ruta){
      //encontradno la extension
     // $posicion=strpos(strrev($ruta),'.');
    //  $ruta=substr($ruta,0,strlen($ruta)-$posicion-1);
       $posicion=strpos(strrev($ruta),DIRECTORY_SEPARATOR);
       $nombre=substr($ruta,strlen($ruta)-$posicion);
       return $nombre;
  }
  
  public function renombraarchivo($filename,$nuevonombre){
       $datosruta= pathinfo($filename);
       $nombrecortado=$this->nombrecortado($filename);
       $nuevonombre=$nombrecortado[0]."_".
               str_replace("","_",$nuevonombre). ///nos aseguramos que no haya ningun  caracter: '_'
               "_".$nombrecortado[2].
               "_".$nombrecortado[3].
               ".".
               $datosruta['extension'];
       yii::log('Este es el filename '.$filename,'error');
       yii::log(' este es l nuevo file    '.$datosruta['dirname'].DIRECTORY_SEPARATOR.$nuevonombre,'error');
      return rename($filename,$datosruta['dirname'].DIRECTORY_SEPARATOR.$nuevonombre);
  }
  
   public function cuantosfileshay(){
      return count($this->recuperaarchivos(false));
   }
   
   
   ///Bota el HTML para prsentar los enclaces de los archivos relacionados 
   public function enlacesarchivos($rutaimagen=null){ 
       $cade="";
       foreach($this->recuperaarchivos(true) as $datosarchivo){ 
           $cad=(!is_null($rutaimagen))?CHtml::image($rutaimagen):$datosarchivo['nombre'];
           $cade.= CHtml::link($cad,$datosarchivo['rutacorta'].DIRECTORY_SEPARATOR.$datosarchivo['nombrecompleto'],array('target'=>'_blank'));
       }
       return $cade;
   }
  
   //transforma todas los formatos de  las imagenes a aRCHIVOS jpeg
   
   public function FileReceptor($fullFileName) {
        // userdata is the same passed via widget config.
                    $path_parts = pathinfo($fullFileName);
                    $ruta_imagen = $fullFileName;
		   $miniatura_ancho_maximo = 200;
		   $miniatura_alto_maximo = 200;
		   $info_imagen = getimagesize($fullFileName);
		   $imagen_ancho = $info_imagen[0];
		   $imagen_alto = $info_imagen[1];
		   $imagen_tipo = $info_imagen['mime'];
			$proporcion_imagen = $imagen_ancho / $imagen_alto;
			$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

		if ( $proporcion_imagen > $proporcion_miniatura ){
				$miniatura_ancho = $miniatura_ancho_maximo;
				$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
		} else if ( $proporcion_imagen < $proporcion_miniatura ){
				$miniatura_ancho = $miniatura_ancho_maximo * $proporcion_imagen;
				$miniatura_alto = $miniatura_alto_maximo;
		} else {
			$miniatura_ancho = $miniatura_ancho_maximo;
			$miniatura_alto = $miniatura_alto_maximo;
		}
			switch ( $imagen_tipo ){
					case "image/jpg":
					case "image/jpeg":
					$imagen = imagecreatefromjpeg($fullFileName );
					break;
					case "image/png":
					$imagen = imagecreatefrompng( $fullFileName );
					break;
				case "image/gif":
					$imagen = imagecreatefromgif( $fullFileName );
					break;
				}
             $lienzo = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );
                imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
                imagejpeg($lienzo,$path_parts['dirname'].DIRECTORY_SEPARATOR.$path_parts['filename'].'.JPG', 100);
               @unlink($fullFileName);
               return $path_parts['dirname'].DIRECTORY_SEPARATOR.$path_parts['filename'].'.JPG';
    	}
   public function sacaprimerafoto(){
       $fotos=$this->fotosparagaleria();
       IF(COUNT($fotos)>0)
     return array(
         "absoluto"=>  str_replace(yii::app()->baseUrl,"",Yii::getPathOfAlias('webroot')).$fotos [0]['archivo'],
         "relativo"=>  $fotos[0]['archivo']
         );
       return array(
         "absoluto"=>''  ,
         "relativo"=>''  
         );
   }
   
   
   /*
    * FUNCIONES BASADAS EN EL MODELO adjuntos 
    */
   public function insertaregistro($ruta){
       $registro= New Adjuntos('insert');//$registro->setAttributes($values)
       $registro->setAttributes(array(
               "codocu"=>$this->_codocu,
                "hiddocu"=>$this->_id,                        
                "enlace"=>$ruta, 
           "extension"=>$this->_extensionatrabajar, 
           "iduser"=>yii::app()->user->id,
           "subido"=>date('Y-m-d H:i:s'),
                ));
       if(!$registro->save()){
           yii::log("chicharron  error","error");
       }else{
            yii::log("chicharrones  ok","error");
       }
   }
   
   public function ActualizaTextos($id,$titulo,$textos){
       /*$criterio=New CDBcriteria();
       $criterio->addCondition("hiddocu=:vid");
        $criterio->addCondition("codocu=:vcodocu");*/
       $registro= Adjuntos::model()->findByPk($id);
       $registro->actualizaTextos($titulo,$textos);
   }
   
   
   //devuelve un conjnto de registro del modelo adjuntos
   //con un id y un codocu
   public function getDataProvider($id,$codocu){
       $criterio=New CDBcriteria();
       $criterio->addCondition("hiddocu=:vid");
        $criterio->addCondition("codocu=:vcodocu");
        $criterio->params=array(
            ":vid"=>$id,
            ":vcodocu"=>$codocu
        );
        return new CActiveDataProvider("Adjuntos", array(
			'criteria'=>$criterio,
		));
   }
   
   
   public function rutaCorta($rutaabsoluta){
       $cad=yii::app()->baseUrl.str_replace(Yii::getPathOfAlias('webroot') , '', $rutaabsoluta);
       RETURN $cad;
       
   }
   
  public function opAjax(){
      return array(
          "type"
      );
  }
   
  /*Decuelve un aray de fotos de un registro listo 
   * para insertarlo en un carrusel:
  $this->widget(
    'booster.widgets.TbCarousel',
    array(
        'items' => array(
            array(
                'image' => bu('images/first-placeholder830x400.gif'),
                'label' => 'First Thumbnail label',
                'caption' => 'First Caption.'
            ),
            array(
                'image' => bu('images/second-placeholder830x400.gif'),
                'label' => 'Second Thumbnail label',
                'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'
            ),
            array(
                'image' => bu('images/third-placeholder830x400.gif'),
                'label' => 'Third Thumbnail label',
                'caption' => 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'
            ),
        ),
    )
);*/
  public function getCarrusel($id,$codocu){
      $datos=$this->getDataProvider($id, $codocu)->getdata();
    $arreglo=array();
      if(count($datos)>0 ){
          foreach($datos as $fila){
              $arreglo['items'][]=array(
                  'image'=>$this->rutaCorta($fila->enlace),
                   'label'=>$fila->titulo,
                  'caption'=>$fila->texto,
                      );
              
          }
      }
      return $arreglo;
      
  }
  
   
}
