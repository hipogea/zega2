<?php
/* @var $this UmsController */
/* @var $model Ums */

$this->breadcrumbs=array(
	'Ums'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Ums', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Unidad de medidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>