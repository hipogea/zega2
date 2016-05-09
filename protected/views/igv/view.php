<?php
/* @var $this IgvController */
/* @var $model Igv */

$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	array('label'=>'Crear Impuesto', 'url'=>array('create')),
	array('label'=>'Modficar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Igv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Impuestos', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'valor',		
		'tipo',
		'Descripcion',
	),
)); ?>
