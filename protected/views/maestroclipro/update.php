<?php
/* @var $this MaestrocliproController */
/* @var $model Maestroclipro */

$this->breadcrumbs=array(
	'Maestroclipros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Maestroclipro', 'url'=>array('index')),
	array('label'=>'Create Maestroclipro', 'url'=>array('create')),
	array('label'=>'View Maestroclipro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Maestroclipro', 'url'=>array('admin')),
);
?>

<h1>Update Maestroclipro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>