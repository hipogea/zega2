<?php
/* @var $this TipoactivosController */
/* @var $model Tipoactivos */

$this->breadcrumbs=array(
	'Tipoactivoses'=>array('index'),
	$model->codtipo=>array('view','id'=>$model->codtipo),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Tipoactivos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Tipoactivos', 'url'=>array('view', 'id'=>$model->codtipo)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar Tipo de Activo', 'gear') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>