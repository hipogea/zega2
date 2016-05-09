<?php
/* @var $this SolpeController */
/* @var $model Solpe */

$this->breadcrumbs=array(
	'Solpes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Listado de solicitudes', 'url'=>array('admin')),
);
?>

<h1>Crear Solicitud de material 1 de 3 </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>