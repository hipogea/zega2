<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */

$this->breadcrumbs=array(
	'Ingfacturas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Ingfactura', 'url'=>array('index')),
	array('label'=>'Crear ', 'url'=>array('create')),
	//array('label'=>'View Ingfactura', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo("Editar Ingreso de Factura","package")   ?>

<?php $this->renderPartial('_form', array('model'=>$model,'editable'=>true)); ?>