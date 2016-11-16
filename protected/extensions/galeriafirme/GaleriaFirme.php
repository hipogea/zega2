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
        public $tema_marco="demo-gallery";
        public $tema_ul="list-unstyled row";
	public $tema_li="col-xs-6 col-sm-4 col-md-3";
        public $rutadefault='site/muestragaleria';
        public $id=null;
         public $ext=null;
        public $rutasajax=array(); //rutas request de lso ajax de los botomnes 
                                    // son 3:   
                                    //  'B'=>'contrlador/accion?    BORRAR
                                   //   'M' =>'contrlador/accion?    ENVIAR POR CORREO
                                    //   'L' =>'contrlador/accion?    LIBRE
        public $ruta=null;
        public $modo=null; /***********************
         *               *    Para usar este widget en llamadas Ajax , debe de insertar primero
         *               *     un Widget en el modo 2 (Para cargar los css y los js el POS_END )
         *               *     Luego en la respuesta del Ajax debe de pintar el Widget en el modo 3 
         *               *      
                         *   1: Modo normal pinta el envoltorio de la galeria <div> <ul>
                         *   2: Modo Ajax , Modo en el cual solo pinta el envoltorio, pero ademas deja un div con un ID que lo sacara de la propiedad 'zonaAjax' : 
                         *   3: Modo Ajax , Modo en el cual solo pinta la galeria, pero sin envoltorio, busca el id del div creado con el modo 2 (zona Ajax y lo rellena (el 
                         ************************/
        public $zonaAjax=null; //Para determinar un div aficional en caoso de que 
        public $isAjaxRequest=false; //Determina si el widget , es llamado
                                     //desde un Ajax, en este caso , solo pintara la galeria 
                                     //sin los <div> y <ul> de envoltorio
	public function init()
	{
            if(is_null($this->id))
            $this->id=uniqid();
            if(IS_NULL($this->modo))throw new CHttpException(500,__FUNCTION__.'   '.__LINE__.'   No has especificado la propiedad MODO es obligatoria'); 
         
            if($this->modo==2 and is_null($this->zonaAjax))throw new CHttpException(500,__FUNCTION__.'   '.__LINE__.'   No has especificado la propiedad zonaAjax, en el modo 2 es obligatoria'); 
         
           
	$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
	$this->ruta=$asset;
    	$cs=Yii::app()->clientScript;
    	$cs->registerCssFile($asset."/css/principal.css");
        $cs->registerCssFile($asset."/css/lightgallery.css");
		//$cs->registerScriptFile($asset."/js/jQueryRotate.min.js");
		$cs->registerScriptFile($asset."/js/lg-autoplay.js",CClientScript::POS_END);	
                $cs->registerScriptFile($asset."/js/lg-fullscreen.js",CClientScript::POS_END);
                $cs->registerScriptFile($asset."/js/lg-hash.js",CClientScript::POS_END);
                $cs->registerScriptFile($asset."/js/lg-pager.js",CClientScript::POS_END);
                $cs->registerScriptFile($asset."/js/lg-zoom.js",CClientScript::POS_END);
                $cs->registerScriptFile($asset."/js/lightgallery.js",CClientScript::POS_END);
                 $cs->registerScriptFile($asset."/js/picturefill.min.js",CClientScript::POS_END);
                 $cs->registerScript("mycodigo",
                         "lightGallery(document.getElementById('".$this->id."'));",                        
                         CClientScript::POS_END);
		
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
            //$this->id=uniqid();
            switch ($this->modo) 
            {
                case 1:
                     $this->pintanormal();
                   //e cho "modo  1"; die();
                    break;
                case 2: 
                     $this->pintaajax2();
                     //echo "modo  2"; die();
                    
                    break;
                case 3:
                     $this->pintaajax3();
                   // echo "modo  3"; die();
                    
                    break;
                default:
                break;
            }
            
            
          
               

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
  
    public function pintaajax2(){
        $this->iniciamarco();
                 $this->etiquetasegundodiv();
                $this->etiquetaul($this->id);                 
             
                 ?> 
                    <div id="<?php echo $this->zonaAjax;   ?>">
                        <!--  aqui se insertara el contenido de la repsuesta Ajax !-->
                    </div>               
               <?php 
               $this->cierraul();
           $this->cierradiv();     
         $this->cierradiv();
  } 
  
  //Solo pinta la galeria dentro del envoltorio de la etiqueta <div = zona Ajax>
  public function pintaajax3(){              
                foreach($this->fotos  as $clave=>$foto){
                    $this->render('fotogaleria',array(
                        'foto'=>$foto ,
                          'idfoto'=>$clave,  
                            
                            ));                    
                                    }              
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
             var_dump($this->ext);    var_dump($this->esimagen());
          $estilo=($this->esimagen())?"demo-gallery":"archiviot";
     echo CHtml::opentag("div",array("class"=>$estilo)); 
      
  }
                
  private function etiquetaul($identidad){
      $estilo=($this->esimagen())?"list-unstyled row":"archivito";          
     echo CHtml::opentag("ul",array("id"=>$identidad,"class"=>$estilo)); 
      
  }
  
  
}
