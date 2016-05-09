<?php
/* @var $this ListamaterialesController */
/* @var $model Listamateriales */

$this->breadcrumbs=array(
	'Listamateriales'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear lista</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>