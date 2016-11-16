<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Ot', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Crear Orden','page_white_gear') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>