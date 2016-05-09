<?php
/* @var $this IngfacturaController */
/* @var $model Ingfactura */

$this->breadcrumbs=array(
	'Ingfacturas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listado ', 'url'=>array('admin')),
	array('label'=>'Crear ingreso', 'url'=>array('crearingreso')),
	array('label'=>'Editar', 'url'=>array('editaringreso', 'id'=>$model->id)),

);
?>

<?php MiFactoria::titulo("Visualizar Ingreso de Factura","package")   ?>

<?php $this->renderPartial('_form', array('model'=>$model,'editable'=>false)); ?>
