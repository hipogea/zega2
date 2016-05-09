<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */

$this->breadcrumbs=array(
	'Coordocs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coordocs', 'url'=>array('index')),
	array('label'=>'Create Coordocs', 'url'=>array('create')),
	array('label'=>'Update Coordocs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coordocs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coordocs', 'url'=>array('admin')),
);
?>

<h1>View Coordocs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'xgeneral',
		'ygeneral',
		'xlogo',
		'ylogo',
		'codocu',
	),
)); ?>
