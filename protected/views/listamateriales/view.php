<?php
/* @var $this ListamaterialesController */
/* @var $model Listamateriales */

$this->breadcrumbs=array(
	'Listamateriales'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Listamateriales', 'url'=>array('index')),
	array('label'=>'Create Listamateriales', 'url'=>array('create')),
	array('label'=>'Update Listamateriales', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Listamateriales', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Listamateriales', 'url'=>array('admin')),
);
?>

<h1>View Listamateriales #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombrelista',
		'comentario',
		'iduser',
		'compartida',
	),
)); ?>
