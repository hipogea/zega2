<?php
class Flashes extends CWidget
{
	public $mensajes=array();
	public $ruta;
	public $grupomensajes=array();
	public function init()
	{
		$asset=Yii::app()->assetManager->publish(dirname(__FILE__).'/assets');
		$this->ruta=$asset;
    	$cs=Yii::app()->clientScript;
    	$cs->registerCssFile($asset."/css/flash.css");
		//$cs->registerScriptFile($asset."/js/jQueryRotate.min.js");
		$cs->registerScriptFile($asset."/js/flash.js");
		//$script = 'assetUrl = "' . $asset . '";';
	}


	public function run()
	{
		/*var_dump(Yii::app()->user->getFlashes(false));
		var_dump($this->sacaclaves());die();*/
		$this->pintamensajes();
	}




	public function pintamensajes()
	{
		$mensajes=yii::app()->user->getFlashes();
		//$mensa=count($mensajes);
		$claves=array_keys($mensajes);
		foreach($claves as $k=>$valorclave){
			$aclaves[$valorclave]=count(explode("<br>",$mensajes[$valorclave]));
		}
		$mensa=count($aclaves);
		if($mensa==1)
			$mensa=array_values($aclaves)[0];
		//var_dump($mensajes['notice']);die();
		/*$aclaves=array(
			'success'=>(is_null($mensajes['success']))?0:count(explode("<br>",$mensajes['success'])),
			'notice'=>(is_null($mensajes['notice']))?0:count(explode("<br>",$mensajes['notice'])),
			'error'=>(is_null($mensajes['error']))?0:count(explode("<br>",$mensajes['error'])),
			);*/
		//var_dump($aclaves);die();
		if($mensa>1)
			$this->render("varias",array('claves'=>$aclaves,'mensajes'=>$mensajes));
		if($mensa==1)
			$this->render("uno",array('mensajes'=>$mensajes));


	}








}
?>
