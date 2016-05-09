<?php
/* @var $this CuentasController */
/* @var $model Cuentas */

$this->breadcrumbs=array(
	'Cuentases'=>array('index'),
	$model->codcuenta=>array('view','id'=>$model->codcuenta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Create Cuentas', 'url'=>array('create')),
	array('label'=>'View Cuentas', 'url'=>array('view', 'id'=>$model->codcuenta)),
	array('label'=>'Manage Cuentas', 'url'=>array('admin')),
);
?>

<h1>Update Cuentas <?php echo $model->codcuenta; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>