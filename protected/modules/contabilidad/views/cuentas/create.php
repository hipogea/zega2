<?php
/* @var $this CuentasController */
/* @var $model Cuentas */

$this->breadcrumbs=array(
	'Cuentases'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Listado Cuentas', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Crear Cuenta ', 'gear')   ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>