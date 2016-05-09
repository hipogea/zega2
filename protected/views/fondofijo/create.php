<?php
/* @var $this FondofijoController */
/* @var $model Fondofijo */

$this->breadcrumbs=array(
	'Fondofijos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Fondofijo', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Fondo fijo  </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>