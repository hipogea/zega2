<?php
class Galeria extends CWidget {

	public $id;
        public $idregistro;
	public $images;	// image tag array, identified by its ALT tag
	public $rutaimagenes; 
	private $_baseUrl;
	public $idimagen;
	public $rutaacciones=array();/* RRAY QUE CONTONE LAS RUTAS A 
         *      LAS ACICOENS DEFINIDAS Parca CADA IMAGEN O ARCHIVO
         *       'B' =>'CONTROLADOR/BORRAR'
         *        'M' =>'CONTROLADOR/CORREO' ...
         * 
         */
        
	

	public function init(){
		parent::init();
	
	  }
private function abremarco(){
	echo "<div class='marcogaleria'  id='papichulo'>";
}
private function abremarquito(){
	echo "<div class='marquito'  >";	
}
private function cierradiv(){
	echo "</div>";	
}

private function abrepanel(){
	echo "<div class='panel'>";	
}


private function abreborde($imagen=null){
    
	echo "<div class='bordeimagen' id='division_".$imagen."'>";
   
   
}
	
	public function run(){
		$this->_prepararAssets();
		$this->abremarco();
		   foreach($this->images as $img){
                       if(is_array($img)){
                           $rutaapintar=$img['archivo'];
                       }else{
                          $rutaapintar=$img; 
                       }
                           
			   $this->pintamarquito($rutaapintar);			   
		   }		   
		$this->cierradiv();		
	     }
		
  private function pintamarquito($imagen) {
	 
		    $this->abremarquito();
			$this->pintaimagen($imagen);			
			$this->cierradiv();		
			
	 
   }
   
   private function pintaimagen($imagen) {
       //echo $imagen;
	     $this->abrepanel();
	      $rutita=Yii::getPathOfAlias('webroot').str_replace(yii::app()->baseUrl,'',$imagen);
              $nombreimagen=array_pop(explode(DIRECTORY_SEPARATOR,$imagen));
             $extension=strtolower(trim(strrev(substr(strrev($nombreimagen),0,3))));             
	    $imagensola=substr($nombreimagen,0,strpos($nombreimagen,"."));
		  echo CHTml::Ajaxlink(CHTml::image($this->_baseUrl.'/tacho.png','',array('width'=>18, 'height'=>20)),
		  Yii::app()->createUrl($this->rutaacciones['B']['accion'],array($this->rutaacciones['B']['parametro']=>$rutita,
                                                                                 'idregistro'=>$this->idregistro,
                                                                                    )
                                        ),
		  array(
		      'type'=>'GET',
                     // 'data'=>array( 'idregistro'=>$this->idregistro),
			  //'update'=>'#division_'.$imagensola,
                      'success' => 'js:function(data) {
                           $("#division_'.$imagensola.'").replaceWith( " <p style=\"color:red;   \" ><b> ¡ Borrado..!</b></p>" ); 
                            $.growlUI("Aviso", data, 0, 0, 0); return false;
                            
                                    }',
			 //'update'=>'#gatito',
		  )
		  
		  
		  );
                  echo CHTml::Ajaxlink(CHTml::image($this->_baseUrl.'/mail.png','',array('width'=>18, 'height'=>20)),
		  Yii::app()->createUrl($this->rutaacciones['M']['accion'],array($this->rutaacciones['B']['parametro']=>base64_encode(serialize($rutita)),
                                                                                 'idregistro'=>$this->idregistro,)
                                                                                ),
		  array(
		      'type'=>'GET',
                    //  'data'=>array( 'idregistro'=>$this->idregistro),
			  'update'=>'#division_'.$imagensola,
			 //'update'=>'#gatito',
		  ),
		  array("onClick"=>"Loading.show(); Loading.hide();")
		  
		  );
                  
                  
                  
		 $this->cierradiv();
		$this->abreborde($imagensola);
	   echo CHTml::link(
                                CHTml::image(  ($this->esimagen($extension))?$imagen:$this->_baseUrl.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$extension.'.png'           ,
                                                    $imagensola,
                                                    array('class'=>'imagenmia')
                                        ),
                                    $imagen,                               
                                        //array('onclick'=>"document.images['".$this->idimagen."'].src='".$this->rutaimagenes.$imagen."';")
	   array('target'=>'_blank','alt'=>$imagensola,'title'=>$imagensola,'onclick'=>"js:document.getElementById('vitrina').src='".$rutita."' ;")
	         
                   );
	   $this->cierradiv();	
           
           
   }
	/*	
		$this->_prepararAssets();
		echo 
"
<div id={$this->id} class='img1-holder'>
";

	$loading = $this->_baseUrl.'/loading.gif';
	$delete  = $this->_baseUrl.'/delete.png';

foreach($this->images as $img)
	echo 
"
<div class='img1-item'>
	<div class='img1-image'>{$img}</div>
	<div class='img1-control'>
		<input title='{$this->selectTitle}' type='radio' name='img1def' value=''>
		<img class='wait' src='{$loading}'>
		<img class='delete' src='{$delete}'>
	</div>
</div>
";

echo "
</div>
";
		$options = CJavaScript::encode(array(
			'confirmDeleteMessage'=>$this->confirmDeleteMessage,
			'action'=>CHtml::normalizeUrl($this->action),
			'selectedid'=>$this->selectedImageId,
			'modelid'=>$this->modelId,
			'id'=>$this->id,
			'onSuccess'=>new CJavaScriptExpression($this->onSuccess),
			'onError'=>new CJavaScriptExpression($this->onError),
		));
		Yii::app()->getClientScript()->registerScript("imagegallery1_corescript"
				,"new ImageGallery1({$options})");
*/
	// end run()
	
	
	
	
	public function _prepararAssets(){
		$localAssetsDir = dirname(__FILE__) . '/assets';
		$this->_baseUrl = Yii::app()->getAssetManager()->publish(
				$localAssetsDir);
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
		foreach(scandir($localAssetsDir) as $f){
			$_f = strtolower($f);
			if(strstr($_f,".swp"))
				continue;
			if(strstr($_f,".js"))
				$cs->registerScriptFile($this->_baseUrl."/".$_f);
			if(strstr($_f,".css"))
				$cs->registerCssFile($this->_baseUrl."/".$_f);
			if(strstr($_f,".jpg"))
				$cs->registerCssFile($this->_baseUrl."/".$_f);
			if(strstr($_f,".png"))
				$cs->registerCssFile($this->_baseUrl."/".$_f);
		}
	}
        
        
       public function esimagen($extension){
      if(in_array($extension,array('jpg','jpeg','png','bmp','png')))
              return true;
          else {
             return false; 
          }
  }  
        
}
