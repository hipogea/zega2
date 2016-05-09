<?php
/* @var $this BorrarController */
/* @var $model Borrar */

$this->breadcrumbs=array(
	'Borrars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Borrar', 'url'=>array('index')),
	array('label'=>'Create Borrar', 'url'=>array('create')),
	array('label'=>'View Borrar', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Borrar', 'url'=>array('admin')),
);
?>

<h1>Update Borrar <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>