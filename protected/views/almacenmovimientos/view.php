<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */

$this->breadcrumbs=array(
	'Almacenmovimientoses'=>array('index'),
	$model->codmov,
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->codmov)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Ver Trasanccion  <?php echo $model->codmov; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codmov',
		'movimiento',
		'signo',
		'codigo_objeto',
		'ingreso',
	),
)); ?>
