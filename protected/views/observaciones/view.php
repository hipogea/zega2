<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Ver Observaciones', 'url'=>array('admin')),
);
?>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hidinventario',
		'fecha',
		'descri',
		'mobs',
		'usuario',
	),
)); ?>
