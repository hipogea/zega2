<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */

$this->breadcrumbs=array(
	'Impuestosdocus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Impuestosdocu', 'url'=>array('index')),
	array('label'=>'Create Impuestosdocu', 'url'=>array('create')),
	array('label'=>'Update Impuestosdocu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Impuestosdocu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Impuestosdocu', 'url'=>array('admin')),
);
?>

<h1>View Impuestosdocu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'codimpuesto',
	),
)); ?>
