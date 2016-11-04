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
	public function init()
	{
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
                         "lightGallery(document.getElementById('lightgallery'));",                        
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
                $this->iniciamarco();
                 ?>
             <div class="demo-gallery">
                <ul id="lightgallery" class="list-unstyled row" >
                <?php
                  
                foreach($this->fotos as $foto){
                    $this->render('fotogaleria',array(
                        'foto'=>$foto
                            
                            ));
                    
                }
               ?>
                </ul>
               <?php 
                 CHtml::closeTag("div");
                
                 $this->cierradiv();
               

	}

	
}
