<?php
/* @var $this DController */
/* @var $model Dcottipo */

$this->breadcrumbs=array(
	'Dcottipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dcottipo', 'url'=>array('index')),
	array('label'=>'Manage Dcottipo', 'url'=>array('admin')),
);
?>

<h1>Create Dcottipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>