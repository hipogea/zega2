<?php
/* @var $this NovedadesController */
/* @var $model Novedades */

$this->breadcrumbs=array(
	'Novedades'=>array('index'),
	$model->idnovedad,
);

$this->menu=array(
	array('label'=>'List Novedades', 'url'=>array('index')),
	array('label'=>'Create Novedades', 'url'=>array('create')),
	array('label'=>'Update Novedades', 'url'=>array('update', 'id'=>$model->idnovedad)),
	array('label'=>'Delete Novedades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idnovedad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Novedades', 'url'=>array('admin')),
);
?>

<h1>View Novedades #<?php echo $model->idnovedad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idnovedad',
		'hidparte',
		'codsistema',
		'codigosap',
		'codigoaf',
		'descri',
		'descridetalle',
		'criticidad',
	),
)); ?>
