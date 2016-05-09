<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */

$this->breadcrumbs=array(
	'Almacenes'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->codalmacen)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Almacenes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codalm',
		'nomal',
		'desalm',
		'tipo',
		'codcen',
		'verprecios',
		'estructura',
		'id',
	),
)); ?>
