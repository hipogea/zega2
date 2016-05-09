<?php
/* @var $this ObservacionesdetalleController */
/* @var $model Observacionesdetalle */

$this->breadcrumbs=array(
	'Observacionesdetalles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Observacionesdetalle', 'url'=>array('index')),
	array('label'=>'Create Observacionesdetalle', 'url'=>array('create')),
	array('label'=>'View Observacionesdetalle', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Observacionesdetalle', 'url'=>array('admin')),
);
?>

<h1>Update Observacionesdetalle <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>