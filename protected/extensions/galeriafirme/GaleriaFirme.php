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
	//$this->ruta=$asset;
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
	}
	private function iniciamarco(){
		echo "<DIV CLASS='home' >";
	}
	private function cierradiv(){
		echo "</div>";
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
                 ?>
             <div class="demo-gallery">
                <ul id="<?php echo $this->id;   ?>" class="list-unstyled row" >
                <?php
                  
                  
                foreach($this->fotos as $foto){
                    $this->render('fotogaleria',array(
                        'foto'=>$foto
                            
                            ));
                    
                }
               ?>
                </ul>
             </DIV>
               <?php                 
                
                 $this->cierradiv();
  }      
    public function pintaajax2(){
        $this->iniciamarco();
                 ?>
             <div class="demo-gallery">
                <ul id="<?php echo $this->id;   ?>" class="list-unstyled row" >
                    <div id="<?php echo $this->zonaAjax;   ?>">
                        <!--  aqui se insertara el contenido de la repsuesta Ajax !-->
                    </div>
                </ul>
             </DIV>
               <?php 
         $this->cierradiv();
  } 
  
  //Solo pinta la galeria dentro del envoltorio de la etiqueta <div = zona Ajax>
  public function pintaajax3(){              
                foreach($this->fotos as $foto){
                    $this->render('fotogaleria',array(
                        'foto'=>$foto  
                            
                            ));                    
                                    }              
                       }     
}
