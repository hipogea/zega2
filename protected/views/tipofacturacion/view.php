<?php
/* @var $this TipofacturacionController */
/* @var $model Tipofacturacion */

$this->breadcrumbs=array(
	'Tipofacturacions'=>array('index'),
	$model->codtipofac,
);

$this->menu=array(
	//array('label'=>'List Tipofacturacion', 'url'=>array('index')),
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
	array('label'=>'Actualizar Modalidad', 'url'=>array('update', 'id'=>$model->codtipofac)),
	//array('label'=>'Delete Tipofacturacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codtipofac),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Modalidades', 'url'=>array('admin')),
);
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codtipofac',
		'tipofacturacion',
		
	),
)); ?>
