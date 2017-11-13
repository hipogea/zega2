<?php
/* @var $this RegimenController */
/* @var $model Regimen */

$this->breadcrumbs=array(
	'Regimens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Regimen', 'url'=>array('index')),
	array('label'=>'Create Regimen', 'url'=>array('create')),
	array('label'=>'View Regimen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Regimen', 'url'=>array('admin')),
);
?>

<h1>Update Regimen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>