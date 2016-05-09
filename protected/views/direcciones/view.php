<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */

$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	$model->n_direc,
);

$this->menu=array(
	array('label'=>'List Direcciones', 'url'=>array('index')),
	array('label'=>'Create Direcciones', 'url'=>array('create')),
	array('label'=>'Update Direcciones', 'url'=>array('update', 'id'=>$model->n_direc)),
	array('label'=>'Delete Direcciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->n_direc),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Direcciones', 'url'=>array('admin')),
);
?>

<h1>View Direcciones #<?php echo $model->n_direc; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_hcod',
		'c_direc',
		'l_vale',
		'c_nomlug',
		'n_valor',
		'c_distrito',
		'c_prov',
		'c_departam',
		'n_direc',
		'socio',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
