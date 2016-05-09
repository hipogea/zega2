<?php
/* @var $this OficiosController */
/* @var $model Oficios */

$this->breadcrumbs=array(
	'Oficioses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Oficios', 'url'=>array('index')),
	array('label'=>'Listado de oficios', 'url'=>array('admin')),
);
?>

<h1>Crear oficio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>