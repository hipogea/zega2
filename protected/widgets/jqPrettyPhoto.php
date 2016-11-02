<?php
class jqPrettyPhoto extends CWidget {
	
	const THEME_FACEBOOK 		= "facebook"; 
	const THEME_DARK_ROUNDED	= "dark_rounded";
	const THEME_DARK_SQUARE		= "dark_square";
	const THEME_LIGHT_ROUNDED 	= "light_rounded";
	const THEME_LIGHT_SQUARE	= "liht_square";
	  
	const PRETTY_SINGLE 	= 1; // create pretty for single links?
	const PRETTY_GALLERY 	= 2; // create pretty gallery?
	
	private $baseUrl;
	/**
	 * @brief retrieve the script file name
	 */
	private function scriptName($css=false) {
		return $css ? '/css/prettyPhoto.css' : '/jquery.prettyPhoto.js';
	}
	
	public function init(){
		$assets = Yii::getPathOfAlias('application.widgets'). DIRECTORY_SEPARATOR.'prettyPhoto';
		$this->baseUrl = Yii::app()->getAssetManager()->publish($assets);
               // var_dump($this->baseUrl);die();
		$this->registerClientScript();
		
	}
	protected function registerClientScript(){
		$cs = Yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile($this->baseUrl.self::scriptName());
		$cs->registerCssFile($this->baseUrl .self::scriptName(true));
	}
	
	public function addPretty($jsSelector=".gallery a", $gallery=self::PRETTY_GALLERY, $theme=self::THEME_FACEBOOK, $opts=array()){
		
		$opts['theme']=$theme;
		
		
		Yii::app()->clientScript->registerScript(__CLASS__,'
			$("'.$jsSelector.'").attr("rel","prettyPhoto'.($gallery==self::PRETTY_GALLERY?'['.time().']':'').'");
			$("a[rel^=\'prettyPhoto\']").prettyPhoto('.CJavaScript::encode($opts).');
		',CClientScript::POS_END);
	}
	
	
}
