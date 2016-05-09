<?php
/* @var $this SolcotController */
/* @var $model Solcot */

$this->breadcrumbs=array(
	'Solcots'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solcot', 'url'=>array('index')),
	array('label'=>'Create Solcot', 'url'=>array('create')),
	array('label'=>'View Solcot', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Solcot', 'url'=>array('admin')),
);
?>

<h1>Update Solcot <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>