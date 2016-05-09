<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */

$this->breadcrumbs=array(
	'Dcotmateriales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dcotmateriales', 'url'=>array('index')),
	array('label'=>'Manage Dcotmateriales', 'url'=>array('admin')),
);
?>

<h1>Create Dcotmateriales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>