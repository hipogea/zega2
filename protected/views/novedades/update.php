<?php
/* @var $this NovedadesController */
/* @var $model Novedades */

$this->breadcrumbs=array(
	'Novedades'=>array('index'),
	$model->idnovedad=>array('view','id'=>$model->idnovedad),
	'Update',
);

$this->menu=array(
	array('label'=>'List Novedades', 'url'=>array('index')),
	array('label'=>'Create Novedades', 'url'=>array('create')),
	array('label'=>'View Novedades', 'url'=>array('view', 'id'=>$model->idnovedad)),
	array('label'=>'Manage Novedades', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'codigodelparte'=>$codigodelparte)); ?>