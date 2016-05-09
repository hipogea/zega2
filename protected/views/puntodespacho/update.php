<?php
/* @var $this PuntodespachoController */
/* @var $model Puntodespacho */

$this->breadcrumbs=array(
	'Puntodespachos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Puntodespacho', 'url'=>array('index')),
	array('label'=>'Create Puntodespacho', 'url'=>array('create')),
	array('label'=>'View Puntodespacho', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Puntodespacho', 'url'=>array('admin')),
);
?>

<h1>Update Puntodespacho <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>