<?php
/* @var $this SeleccionableController */
/* @var $model Seleccionable */

$this->breadcrumbs=array(
	'Seleccionables'=>array('index'),
	$model->codsel,
);

$this->menu=array(
	array('label'=>'List Seleccionable', 'url'=>array('index')),
	array('label'=>'Create Seleccionable', 'url'=>array('create')),
	array('label'=>'Update Seleccionable', 'url'=>array('update', 'id'=>$model->codsel)),
	array('label'=>'Delete Seleccionable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codsel),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seleccionable', 'url'=>array('admin')),
);
?>

<h1>View Seleccionable #<?php echo $model->codsel; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codsel',
		'desel',
		'codigo',
	),
)); ?>
