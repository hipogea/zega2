<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */

$this->breadcrumbs=array(
	'Alkardexes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alkardex', 'url'=>array('index')),
	array('label'=>'Create Alkardex', 'url'=>array('create')),
	array('label'=>'Update Alkardex', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alkardex', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alkardex', 'url'=>array('admin')),
);
?>

<h1>View Alkardex #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codart',
		'codmov',
		'cant',
		'alemi',
		'aldes',
		'fecha',
		'coddoc',
		'numdoc',
		'usuario',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'um',
		'comentario',
		'codocuref',
		'numdocref',
		'codcentro',
		'id',
		'codestado',
		'prefijo',
		'fechadoc',
		'correlativo',
		'numkardex',
		'solicitante',
		'hidvale',
	),
)); ?>
