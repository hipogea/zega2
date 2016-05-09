<?php
/* @var $this TrabajadoresController */
/* @var $model Trabajadores */

$this->breadcrumbs=array(
	'Trabajadores'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Trabajadores', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Trabajador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>