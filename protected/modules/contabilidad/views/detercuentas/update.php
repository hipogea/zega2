<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */

$this->breadcrumbs=array(
	'Detercuentases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Detercuentas', 'url'=>array('index')),
	array('label'=>'Create Detercuentas', 'url'=>array('create')),
	array('label'=>'View Detercuentas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Detercuentas', 'url'=>array('admin')),
);
?>

<h1>Update Detercuentas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>