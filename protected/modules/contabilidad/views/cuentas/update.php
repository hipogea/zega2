<?php
/* @var $this CuentasController */
/* @var $model Cuentas */

$this->breadcrumbs=array(
	'Cuentases'=>array('index'),
	$model->codcuenta=>array('view','id'=>$model->codcuenta),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
	//array('label'=>'View Cuentas', 'url'=>array('view', 'id'=>$model->codcuenta)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar Cuenta '.$model->codcuenta, 'gear')   ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>