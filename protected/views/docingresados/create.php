<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */

$this->breadcrumbs=array(
	'Docingresadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Crear proveedor', 'url'=>array('/clipro/create')),
	array('label'=>'Crear trabajador', 'url'=>array('/trabajadores/create')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Ingresar Documento</h1>

<?php echo $this->renderPartial('_form', array('esfinal'=>false,'model'=>$model)); ?>