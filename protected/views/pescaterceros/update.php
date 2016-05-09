<?php
/* @var $this PescatercerosController */
/* @var $model Pescaterceros */

$this->breadcrumbs=array(
	'Pescaterceroses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pescaterceros', 'url'=>array('index')),
	array('label'=>'Create Pescaterceros', 'url'=>array('create')),
	array('label'=>'View Pescaterceros', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pescaterceros', 'url'=>array('admin')),
);
?>

<h1>Update Pescaterceros <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>