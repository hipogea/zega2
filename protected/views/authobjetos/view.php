<?php
/* @var $this AuthobjetosController */
/* @var $model Authobjetos */

$this->breadcrumbs=array(
	'Authobjetoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Authobjetos', 'url'=>array('index')),
	array('label'=>'Create Authobjetos', 'url'=>array('create')),
	array('label'=>'Update Authobjetos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Authobjetos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Authobjetos', 'url'=>array('admin')),
);
?>

<h1>View Authobjetos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'descripcion',
		'texto',
	),
)); ?>
