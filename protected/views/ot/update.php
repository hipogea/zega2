<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ot', 'url'=>array('index')),
	array('label'=>'Create Ot', 'url'=>array('create')),
	array('label'=>'View Ot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ot', 'url'=>array('admin')),
);
?>

<h1>Update Ot <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('modelolabor'=>$modelolabor,'model'=>$model)); ?>