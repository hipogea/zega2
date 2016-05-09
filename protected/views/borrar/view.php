<?php
/* @var $this BorrarController */
/* @var $model Borrar */

$this->breadcrumbs=array(
	'Borrars'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Borrar', 'url'=>array('index')),
	array('label'=>'Create Borrar', 'url'=>array('create')),
	array('label'=>'Update Borrar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Borrar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Borrar', 'url'=>array('admin')),
);
?>

<h1>View Borrar #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
	),
)); ?>
