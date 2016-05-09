<?php
/* @var $this AlreservaController */
/* @var $model Alreserva */

$this->breadcrumbs=array(
	'Alreservas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alreserva', 'url'=>array('index')),
	array('label'=>'Create Alreserva', 'url'=>array('create')),
	array('label'=>'View Alreserva', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alreserva', 'url'=>array('admin')),
);
?>

<h1>Update Alreserva <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>