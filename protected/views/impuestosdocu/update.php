<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */

$this->breadcrumbs=array(
	'Impuestosdocus'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Impuestosdocu', 'url'=>array('index')),
	array('label'=>'Create Impuestosdocu', 'url'=>array('create')),
	array('label'=>'View Impuestosdocu', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Impuestosdocu', 'url'=>array('admin')),
);
?>

<h1>Update Impuestosdocu <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>