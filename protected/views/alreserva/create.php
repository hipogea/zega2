<?php
/* @var $this AlreservaController */
/* @var $model Alreserva */

$this->breadcrumbs=array(
	'Alreservas'=>array('index'),
	'Create',
);



$this->menu=array(
	array('label'=>'List Alreserva', 'url'=>array('index')),
	array('label'=>'Manage Alreserva', 'url'=>array('admin')),
);
?>

<h1>Create Alreserva</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>