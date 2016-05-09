<?php
/* @var $this OpcontablesController */
/* @var $model Opcontables */

$this->breadcrumbs=array(
	'Opcontables'=>array('index'),
	$model->codop=>array('view','id'=>$model->codop),
	'Update',
);

$this->menu=array(
	array('label'=>'List Opcontables', 'url'=>array('index')),
	array('label'=>'Create Opcontables', 'url'=>array('create')),
	array('label'=>'View Opcontables', 'url'=>array('view', 'id'=>$model->codop)),
	array('label'=>'Manage Opcontables', 'url'=>array('admin')),
);
?>

<h1>Update Opcontables <?php echo $model->codop; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>