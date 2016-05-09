<?php
/* @var $this EventosController */
/* @var $model Eventos */

$this->breadcrumbs=array(
	'Eventoses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Eventos', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Evento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>