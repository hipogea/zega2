<?php
class GaleriaFirme extends CWidget
{
	public $fotos =array();
        //es una array que contiene las rutas de las fotos 
        /***************************************************
         * ARRAY(
         *        array(
         *                'archivo'=>'/carpeta/julian.jpg',
         *                'texto corto'=>'Esta foto es mi favorita ...',
         *                'metadatos'=>'CREaDA: EL 10/10 POR admin ',
         *             ),
         * 
         *          array(
         *                'archivo'=>'/carpeta/yesenia.jpg',
         *                'texto corto'=>'Esta foto es mde mi esposa ...',
         *                'metadatos'=>'CREaDA: EL 14/10 POR admin ',
         *             ),
         *       ...
         *    )  
         * 
         *************************************************/
        
        
        public $titulo; //titulo de la galeria de fotos 
        public $mensajegeneral; //un mensje que peude reptirse en todas alas fotos 
        public $rutasajax=array(); //rutas request de lso ajax de los botomnes 
                                    // son 3:   
                                    //  'B'=>'contrlador/accion?    BORRAR
                                   //   'M' =>'contrlador/accion?    ENVIAR POR CORREO
                                    //   'L' =>'contrlador/accion?    LIBRE
        public $ruta=null;
      public function init()
	{
            if(is_null($this->id))
            $this->id=uniqid();
           $asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
	$this->ruta=$asset;
    	$cs=Yii::app()->clientScript;
    	$cs->registerCssFile($asset."/css/principal.css");
       /* $cs->registerScript("mycodigo",
                         "lightGallery(document.getElementById('".$this->id."'));",                        
                         CClientScript::POS_END);*/
		
		//$script = 'assetUrl = "' . $asset . '";';
                 if(count($this->fotos)>0)
                 $this->ext=strtolower(trim(strrev(substr(strrev($this->fotos[0]['archivo']),0,3))));
	
        }
	private function iniciamarco(){
		echo "<DIV CLASS='home' >";
	}
	private function cierradiv(){
		echo "</div>";
	}
        private function cierraul(){
		echo "</ul>";
	}

	public function run()
	{
            
                     $this->pintanormal();
                   
           
	}


  public function pintanormal(){
        $this->iniciamarco();
          $this->etiquetasegundodiv();
                $this->etiquetaul($this->id);                 
                foreach($this->fotos as $clave=>$foto){
                    $this->render('fotogaleria',array(
                        'foto'=>$foto,
                          'idfoto'=>$clave,  
                            ));                    
                }
                $this->cierraul();
           $this->cierradiv();     
         $this->cierradiv();
  }   
  
                
  public function esimagen(){
      if(in_array($this->ext,array('jpg','jpeg','png','bmp','png')))
              return true;
          else {
             return false; 
          }
  }
  
  
  pUBLIC function opcionajax($idfoto,$funcion=NULL){
      if(count($this->fotos)){
           $rutita=$this->fotos[$idfoto]['archivo'];
      $rutita=Yii::getPathOfAlias('webroot').str_replace(yii::app()->baseUrl,'',$rutita);
      
        $opajaxx=array(
            'type'=>'GET',
            'url'=>$this->rutasajax[$funcion],
            'data'=>array(
                'rutaarchivo'=>base64_encode(serialize($rutita)),               
            
            ),
            'success'=>'',
            
           );
        return $opajaxx;
      }else{
          return array();
      }
     
     
  }
  
  
  private function etiquetasegundodiv(){
            // var_dump($this->ext);    var_dump($this->esimagen());
         // $estilo=($this->esimagen())?"demo-gallery":"archiviot";
     echo CHtml::opentag("div",array(/*"class"=>$estilo*/)); 
      
  }
                
  private function etiquetaul($identidad){
     // $estilo=($this->esimagen())?"list-unstyled row":"archivito";          
     echo CHtml::opentag("ul",array("id"=>$identidad,/*"class"=>$estilo*/)); 
      
  }
  
  
}
