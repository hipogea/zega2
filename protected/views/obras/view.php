<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obrases'=>array('index'),
	$model->idobra,
);

$this->menu=array(
	array('label'=>'List Obras', 'url'=>array('index')),
	array('label'=>'Create Obras', 'url'=>array('create')),
	array('label'=>'Update Obras', 'url'=>array('update', 'id'=>$model->idobra)),
	array('label'=>'Delete Obras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idobra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Obras', 'url'=>array('admin')),
);
?>

<h1>View Obras #<?php echo $model->idobra; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'descriobra',
		'oi',
		'idinventario',
		'fechasol',
		'codep',
		'fechacierre',
		'cc',
		'estado',
		'om',
		'obs',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'centro',
		'numero',
		'prefijo',
		'idobra',
	),
)); ?>
