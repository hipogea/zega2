<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */

$this->breadcrumbs=array(
	'Alconversiones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alconversiones', 'url'=>array('index')),
	array('label'=>'Manage Alconversiones', 'url'=>array('admin')),
);
?>

<h1>Create Alconversiones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>