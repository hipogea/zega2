<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */

$this->breadcrumbs=array(
	'Almacenes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Almacenes', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Almacen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
