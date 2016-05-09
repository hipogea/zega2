<?php
/* @var $this MaestroAtributosController */
/* @var $model MaestroAtributos */

$this->breadcrumbs=array(
	'Maestro Atributoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MaestroAtributos', 'url'=>array('index')),
	array('label'=>'Manage MaestroAtributos', 'url'=>array('admin')),
);
?>

<h1>Create MaestroAtributos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>