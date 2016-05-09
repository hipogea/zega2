<?php
/* @var $this DocumentosfavoritosController */
/* @var $model Documentosfavoritos */

$this->breadcrumbs=array(
	'Documentosfavoritoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Documentosfavoritos', 'url'=>array('index')),
	array('label'=>'Create Documentosfavoritos', 'url'=>array('create')),
	array('label'=>'Update Documentosfavoritos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Documentosfavoritos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Documentosfavoritos', 'url'=>array('admin')),
);
?>

<h1>View Documentosfavoritos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'hidocu',
		'iduser',
		'nombre',
		'texto',
		'column_7',
		'compartido',
	),
)); ?>
