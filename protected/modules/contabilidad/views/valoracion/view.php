<?php
/* @var $this ValoracionController */
/* @var $model Catvaloracion */

$this->breadcrumbs=array(
	'Catvaloracions'=>array('index'),
	$model->codcatval,
);

$this->menu=array(
	array('label'=>'List Catvaloracion', 'url'=>array('index')),
	array('label'=>'Create Catvaloracion', 'url'=>array('create')),
	array('label'=>'Update Catvaloracion', 'url'=>array('update', 'id'=>$model->codcatval)),
	array('label'=>'Delete Catvaloracion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codcatval),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catvaloracion', 'url'=>array('admin')),
);
?>

<h1>View Catvaloracion #<?php echo $model->codcatval; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codcatval',
		'descat',
	),
)); ?>
