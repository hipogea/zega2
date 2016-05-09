<?php
/* @var $this CliproController */
/* @var $model Clipro */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>