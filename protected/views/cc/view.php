<?php
/* @var $this CcController */
/* @var $model Cc */

$this->breadcrumbs=array(
	'Ccs'=>array('index'),
	$model->codc,
);

$this->menu=array(
	array('label'=>'List Cc', 'url'=>array('index')),
	array('label'=>'Create Cc', 'url'=>array('create')),
	array('label'=>'Update Cc', 'url'=>array('update', 'id'=>$model->codc)),
	array('label'=>'Delete Cc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cc', 'url'=>array('admin')),
);
?>

<h1>View Cc #<?php echo $model->codc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcc',
		'codc',
		'cc',
		'centro',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
