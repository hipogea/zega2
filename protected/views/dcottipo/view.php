<?php
/* @var $this DcottipoController */
/* @var $model Dcottipo */

$this->breadcrumbs=array(
	'Dcottipos'=>array('index'),
	$model->codtipo,
);

$this->menu=array(
	array('label'=>'List Dcottipo', 'url'=>array('index')),
	array('label'=>'Create Dcottipo', 'url'=>array('create')),
	array('label'=>'Update Dcottipo', 'url'=>array('update', 'id'=>$model->codtipo)),
	array('label'=>'Delete Dcottipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codtipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dcottipo', 'url'=>array('admin')),
);
?>

<h1>View Dcottipo #<?php echo $model->codtipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codtipo',
		'destipo',
	),
)); ?>
