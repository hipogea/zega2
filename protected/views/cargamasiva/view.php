<?php
/* @var $this CargamasivaController */
/* @var $model Cargamasiva */

$this->breadcrumbs=array(
	'Cargamasivas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cargamasiva', 'url'=>array('index')),
	array('label'=>'Create Cargamasiva', 'url'=>array('create')),
	array('label'=>'Update Cargamasiva', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cargamasiva', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cargamasiva', 'url'=>array('admin')),
);
?>

<h1>View Cargamasiva #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'modelo',
		'iduser',
		'fechacreac',
		'fechaejec',
		'insercion',
		'descripcion',
	),
)); ?>
