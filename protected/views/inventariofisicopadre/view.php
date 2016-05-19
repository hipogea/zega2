<?php
/* @var $this InventariofisicopadreController */
/* @var $model Inventariofisicopadre */

$this->breadcrumbs=array(
	'Inventariofisicopadres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Inventariofisicopadre', 'url'=>array('index')),
	array('label'=>'Create Inventariofisicopadre', 'url'=>array('create')),
	array('label'=>'Update Inventariofisicopadre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Inventariofisicopadre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inventariofisicopadre', 'url'=>array('admin')),
);
?>

<h1>View Inventariofisicopadre #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ano',
		'mes',
		'esciego',
		'descripcion',
		'numero',
		'codocu',
		'fechaprog',
		'fechacre',
		'codresponsable',
		'codestado',
		'codcen',
		'codal',
	),
)); ?>
