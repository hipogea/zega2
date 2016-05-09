<?php
/* @var $this NovedadesController */
/* @var $model Novedades */

$this->breadcrumbs=array(
	'Novedades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Novedades', 'url'=>array('index')),
	array('label'=>'Manage Novedades', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model,'codigodelparte'=>$codigodelparte)); ?>