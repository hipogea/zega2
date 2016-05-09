<?php
/* @var $this MaestroAtributosController */
/* @var $model MaestroAtributos */

$this->breadcrumbs=array(
	'Maestro Atributoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MaestroAtributos', 'url'=>array('index')),
	array('label'=>'Create MaestroAtributos', 'url'=>array('create')),
	array('label'=>'Update MaestroAtributos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MaestroAtributos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MaestroAtributos', 'url'=>array('admin')),
);
?>

<h1>View MaestroAtributos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombreat',
		'hid',
		'abreviatura',
		'padre',
		'jerarquia',
		'respaldo',
		'respaldo2',
		'respaldo3',
		'texto',
		'tieneum',
	),
)); ?>
