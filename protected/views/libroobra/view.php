<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */

$this->breadcrumbs=array(
	'Libroobras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Libroobra', 'url'=>array('index')),
	array('label'=>'Create Libroobra', 'url'=>array('create')),
	array('label'=>'Update Libroobra', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Libroobra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Libroobra', 'url'=>array('admin')),
);
?>

<h1>View Libroobra #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidot',
		'fecha',
		'texto',
		'hinicio',
		'hfinal',
		'temperatura',
		'hr',
		'lluvias',
		'viento',
		'hiddireccion',
	),
)); ?>
