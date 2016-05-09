<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */

$this->breadcrumbs=array(
	'Alconversiones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alconversiones', 'url'=>array('index')),
	array('label'=>'Create Alconversiones', 'url'=>array('create')),
	array('label'=>'View Alconversiones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alconversiones', 'url'=>array('admin')),
);
?>

<h1>Update Alconversiones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>