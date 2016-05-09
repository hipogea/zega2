<?php
/* @var $this DespachoController */
/* @var $model Despacho */

$this->breadcrumbs=array(
	'Despachos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Despacho', 'url'=>array('index')),
	array('label'=>'Create Despacho', 'url'=>array('create')),
	array('label'=>'View Despacho', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Despacho', 'url'=>array('admin')),
);
?>

<h1>Update Despacho <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>