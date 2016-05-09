<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */

$this->breadcrumbs=array(
	'Dcotmateriales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dcotmateriales', 'url'=>array('index')),
	array('label'=>'Create Dcotmateriales', 'url'=>array('create')),
	array('label'=>'View Dcotmateriales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dcotmateriales', 'url'=>array('admin')),
);
?>

<h1>Update Dcotmateriales <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>