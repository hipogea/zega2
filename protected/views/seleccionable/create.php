<?php
/* @var $this SeleccionableController */
/* @var $model Seleccionable */

$this->breadcrumbs=array(
	'Seleccionables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seleccionable', 'url'=>array('index')),
	array('label'=>'Manage Seleccionable', 'url'=>array('admin')),
);
?>

<h1>Create Seleccionable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>