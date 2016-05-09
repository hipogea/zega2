<?php
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */

$this->breadcrumbs=array(
	'Maestrocompos'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Maestrocompo', 'url'=>array('index')),
	array('label'=>'Crear Material', 'url'=>array('create')),
	array('label'=>'Modificar Material', 'url'=>array('update', 'id'=>$model->codigo)),
	//array('label'=>'Delete Maestrocompo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Ver material   - <?php echo $model->codigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'marca',
		'modelo',
		'nparte',
		//'codpadre',
		'um',
		'descripcion',		
		'creadoel',
		'creadopor',
		
	),
)); ?>
