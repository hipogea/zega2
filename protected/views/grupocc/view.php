<?php
/* @var $this GrupoccController */
/* @var $model Grupocc */

$this->breadcrumbs=array(
	'Grupoccs'=>array('index'),
	$model->codgrupo,
);

$this->menu=array(
	array('label'=>'List Grupocc', 'url'=>array('index')),
	array('label'=>'Create Grupocc', 'url'=>array('create')),
	array('label'=>'Update Grupocc', 'url'=>array('update', 'id'=>$model->codgrupo)),
	array('label'=>'Delete Grupocc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codgrupo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Grupocc', 'url'=>array('admin')),
);
?>

<h1>View Grupocc #<?php echo $model->codgrupo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codgrupo',
		'desgrupo',
	),
)); ?>
