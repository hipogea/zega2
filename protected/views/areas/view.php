<?php
/* @var $this AreasController */
/* @var $model Areas */

$this->breadcrumbs=array(
	'Areases'=>array('index'),
	$model->codarea,
);

$this->menu=array(

	array('label'=>'Crear Area', 'url'=>array('create')),
	array('label'=>'Actualizar Area', 'url'=>array('update', 'id'=>$model->codarea)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Areas #<?php echo $model->codarea; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codarea',
		'area',
		'explica',
	),
)); ?>
