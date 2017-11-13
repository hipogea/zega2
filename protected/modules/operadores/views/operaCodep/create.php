<?php
/* @var $this OperaCodepController */
/* @var $model OperaCodep */

$this->breadcrumbs=array(
	'Opera Codeps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OperaCodep', 'url'=>array('index')),
	array('label'=>'Manage OperaCodep', 'url'=>array('admin')),
);
?>

<h1>Create OperaCodep</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>