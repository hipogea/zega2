<?php
/**
 * ImageGallery1
 *
 *	Presents an image list (css & jQuery based) containing a delete control
 *	and a select control for each image in order to mark it as the default 
 *	image for your selected model or simply to indicate the image deletion.
 *
 *	Delete button:
 *	Is a button located at the bottom-right of each image, when pressed an
 *	action is fired, is your responsability to delete the referenced image.
 *
 *	Select radio button:	
 *	Is located at the left-bottom of each image, when clicked an action is
 *	fired and is your responsability to make it the default image for your 
 *	model.
 *
 *	the action form required in your controller is as follow:	
 *	
 *		public function actionMyAction($modelid, $id, $action){
 *			// ..do something based on 'action'..
 *			if($action == 'select') { ..mark the image $id as default..  } 
 *			if($action == 'delete') { ... delete the image ref by $id... }
 *		}
 *
 *	as an example usage:
 *
 *	$this->widget('ext.imagegallery1.ImageGallery1',array(
 *		'images'=>array("<img alt='120' src='bla'>",...more images....),
 *		'action'=>array('/site/myaction'),	
 *		'modelId'=>'article12',		// $model->primarykey (as an example)
 *		'selectedImageId'=>'120',	// the ID for your image...any unique ID
 *		'onSuccess'=>'function(data){  }',
 *		'onError'=>'function(e){ alert(e);  }',
 *	));
 *
 *
 *
 * @uses CWidget
 * @author Christian Salazar <christiansalazarh@gmail.com> 
 * @license BSD LICENSE http://opensource.org/licenses/bsd-license.php
 */
class ImageGallery1 extends CWidget {

	public $id;
	public $images;	// image tag array, identified by its ALT tag
	public $action;	// array url
	public $selectedImageId; // the default image marked as selected.
	public $modelId;	// passed back to the action as 'modelid' URL argument
	public $confirmDeleteMessage='Confirma eliminar esta imagen ?';
	public $selectTitle = 'Marque para indicar que es la imagen por defecto';

	public $onSuccess;
	public $onError;
	private $_baseUrl;

	public function init(){
		parent::init();
		if($this->id == null)
			$this->id = 'imagegallery10';
		if($this->onSuccess == null)
			$this->onSuccess = "function(){}";
		if($this->onError == null)
			$this->onError = "function(){}";
	}

	public function run(){
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

	}// end run()
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
		}
	}
}
