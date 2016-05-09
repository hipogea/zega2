<?php
/* @var $this PuntodespachoController */
/* @var $model Puntodespacho */

$this->breadcrumbs=array(
	'Puntodespachos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Puntodespacho', 'url'=>array('index')),
	array('label'=>'Manage Puntodespacho', 'url'=>array('admin')),
);
?>

<h1>Create Puntodespacho</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>