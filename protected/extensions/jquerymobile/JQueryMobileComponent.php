<?php
/**
 * JQueryMobileComponent 
 *
 *	Insert a JQuery Mobile Theme and Script into your application.
 *
 *	Usage:
 *
 	1. register a new component into: protected/config/main.php

 			'components'=>array(
				'class'=>'application.extensions.JQueryMobileComponent',
				'theme'=>'jqm-default.theme.min.js',  
					// any available in extensions/jquerymobile/themes
			),

	2. launch it at startup.

			'init'=>array(..., 'jquerymobile'),
 *
 *
 *
 * @uses CApplicationComponent
 * @author Cristian Salazar H. <christiansalazarh@gmail.com> @salazarchris74 
 * @license FreeBSD {@link http://www.freebsd.org/copyright/freebsd-license.html}
 */
class JQueryMobileComponent extends CApplicationComponent {
	public $theme = 'default';
	public $autoload = false;
	public $external_sample = false;
	public function init(){
		$this->publishAssets();
	}
	private function publishAssets(){
		$localAssetsDir = dirname(__FILE__) . '/assets';
		$localThemesDir = dirname(__FILE__) . '/themes';
		$assets = Yii::app()->getAssetManager()->publish($localAssetsDir);
		$assets2 = Yii::app()->getAssetManager()->publish($localThemesDir);
        $cs = Yii::app()->getClientScript();
		$cs->corePackages=require(YII_PATH.'/web/js/packages.php');
		// now process js files, by fixing path, moving them to this component
		
		$jquery = &$cs->corePackages['jquery'];
		$jquery['basePath'] = $localAssetsDir."/jquery.min.js";
		$jquery['baseUrl'] = $assets;
		$jquery['js'] = array('jquery.min.js');
		//die(); 
		$jqm = &$cs->corePackages['jquery.mobile'];
		$jqm['basePath'] = $localAssetsDir."/jqm.min.js";
		$jqm['baseUrl'] = $assets;
		$jqm['js'] = array('jqm.min.js');
		$jqm['depends'] = array('jquery');

		$jqms = &$cs->corePackages['jquery.mobile.structure'];
		$jqms['basePath'] = $localAssetsDir."jqmmin.css";
		$jqms['baseUrl'] = $assets;
		$jqms['css'] = array('jqm.min.css');
		$jqms['depends'] = array();

		$jqmi = &$cs->corePackages['jquery.mobile.theme.icons'];
		$jqmi['basePath'] = $localThemesDir.
			'/'.$this->theme.'/'.$this->theme.'.min.css';
		$jqmi['baseUrl'] = $assets2;
		$jqmi['css'] = array($this->theme.'/jquery.mobile.icons.min.css');
		$jqmi['depends'] = array('jquery.mobile');

		$jqmt = &$cs->corePackages['jquery.mobile.theme'];
		$jqmt['basePath'] = $localThemesDir.
			'/'.$this->theme.'/'.$this->theme.'.min.css';
		$jqmt['baseUrl'] = $assets2;
		$jqmt['css'] = array($this->theme.'/'.$this->theme.'.min.css');
		$jqmt['depends'] = array(
			'jquery.mobile','jquery.mobile.structure',
				'jquery.mobile.theme.icons');

		if(true === $this->external_sample){
			Yii::app()->clientScript->registerLinkTag(
			"stylesheet",NULL,
			"http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.css");
			Yii::app()->clientScript->registerScriptFile(
				"http://code.jquery.com/jquery-1.8.3.min.js", 
					CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile(
				"http://code.jquery.com/mobile/1.2.1/jquery.mobile-1.2.1.min.js",
					CClientScript::POS_HEAD);
		}else{
			if(true === $this->autoload){
				// now, we can proceed as regular
				$cs->registerCoreScript("jquery.mobile.theme");
			}
		}
	}
}
