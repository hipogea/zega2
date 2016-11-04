<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Ot', 'url'=>array('index')),
	array('label'=>'Nueva orden', 'url'=>array('creadocumento')),
	array('label'=>'salir','url'=>array('salir')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

 <?php MiFactoria::titulo('Modificar Orden','page_white_gear') ?>

<?php $this->renderPartial('_form', array('modeloconsi'=>$modeloconsi,'modelolabor'=>$modelolabor,'model'=>$model)); ?>