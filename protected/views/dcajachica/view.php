<?php
/* @var $this DcajachicaController */
/* @var $model Dcajachica */

$this->breadcrumbs=array(
	'Dcajachicas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Dcajachica', 'url'=>array('index')),
	array('label'=>'Create Dcajachica', 'url'=>array('create')),
	array('label'=>'Update Dcajachica', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Dcajachica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dcajachica', 'url'=>array('admin')),
);
?>

<h1>View Dcajachica #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidcaja',
		'fecha',
		'glosa',
		'referencia',
		'debe',
		'haber',
		'monedahaber',
		'saldo',
		'codtra',
		'ceco',
		'fechacre',
		'iduser',
		'codocu',
	),
)); ?>
