<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */

$this->breadcrumbs=array(
	'Direcciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Direcciones', 'url'=>array('index')),
	array('label'=>'Manage Direcciones', 'url'=>array('admin')),
);
?>

<h1>Create Direcciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'codigoproveedor'=>$codigoproveedor)); ?>