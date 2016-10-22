<?php
/* @var $this TenenciasController */
/* @var $model Tenencias */



$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->codte)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Visualizar  tenencia', 'Node') ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codte',
		'deste',
		'codcen',
	),
)); ?>
