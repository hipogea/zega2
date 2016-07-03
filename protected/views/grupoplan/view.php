<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */

$this->breadcrumbs=array(
	'Grupoplans'=>array('index'),
	$model->codgrupo,
);

$this->menu=array(
	array('label'=>'List Grupoplan', 'url'=>array('index')),
	array('label'=>'Create Grupoplan', 'url'=>array('create')),
	array('label'=>'Update Grupoplan', 'url'=>array('update', 'id'=>$model->codgrupo)),
	array('label'=>'Delete Grupoplan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codgrupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupoplan', 'url'=>array('admin')),
);
?>

<h1>View Grupoplan #<?php echo $model->codgrupo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codgrupo',
		'desgrupo',
		'interno',
	),
)); ?>
