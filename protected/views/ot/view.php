<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ot', 'url'=>array('index')),
	array('label'=>'Create Ot', 'url'=>array('create')),
	array('label'=>'Update Ot', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ot', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ot', 'url'=>array('admin')),
);
?>

<h1>View Ot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'fechacre',
		'fechafinprog',
		'codpro',
		'idobjeto',
		'codresponsable',
		'textocorto',
		'textolargo',
		'grupoplan',
		'codcen',
		'iduser',
		'codocu',
		'codestado',
		'clase',
		'hidoferta',
	),
)); ?>
