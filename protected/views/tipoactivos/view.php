<?php
/* @var $this TipoactivosController */
/* @var $model Tipoactivos */

$this->breadcrumbs=array(
	'Tipoactivoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Tipoactivos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Tipoactivos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>V<?php echo $model->tipodeactivo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'letra',
		'tipodeactivo',
	),
)); ?>
