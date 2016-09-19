<?php
/*
* gauge extention
* author : pegel.linuxs@gmail.com
*/
class Camara extends CWidget
{
	
	/*
	* @var options for gauge options
	*/
	
	public $botones=array(); ///clave de boton y como valor un array que contiene el enlace (otro artray)  y un flag para determonar
	//si el boton es SUBMIT  array['save'=> 'S' ]
	// O ENLACE  			array['print'=>array( '/recurso/', array('id'=>23))  ]   SE DEBE DE ESPECIFICAR LE ENELACE CON UN ARRAY
	public $size; ///pixeles para el tamaño de los botones
	public $ruta;
	public $extension;
	public $accion;

		
	public function init()
	{


$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
$this->ruta=$asset;
  $cs=Yii::app()->clientScript;

    	//$cs->registerCssFile($asset."/css/barra.css");
		//$cs->registerScriptFile($asset."/js/jQueryRotate.min.js");
		$cs->registerScriptFile($asset."/js/webcam.js");
		
		$script = 'assetUrl = "' . $asset . '";';

	}
	

	public function run()
	{

   $this->render('camara',array('accion'=>$this->accion));


	}

	
}
