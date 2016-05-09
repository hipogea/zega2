<?php
/* @var $this ChoferesController */
/* @var $model Choferes */

$this->breadcrumbs=array(
	'Choferes'=>array('index'),
	'Create',
);

$this->menu=array(

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Conductor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>