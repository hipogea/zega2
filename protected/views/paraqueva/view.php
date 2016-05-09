<?php
/* @var $this ParaquevaController */
/* @var $model Paraqueva */

$this->breadcrumbs=array(
	'Paraquevas'=>array('index'),
	$model->cmotivo,
);

$this->menu=array(
	array('label'=>'List Paraqueva', 'url'=>array('index')),
	array('label'=>'Create Paraqueva', 'url'=>array('create')),
	array('label'=>'Update Paraqueva', 'url'=>array('update', 'id'=>$model->cmotivo)),
	array('label'=>'Delete Paraqueva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cmotivo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Paraqueva', 'url'=>array('admin')),
);
?>

<h1>View Paraqueva #<?php echo $model->cmotivo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cmotivo',
		'motivo',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
