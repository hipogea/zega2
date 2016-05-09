<?php
/* @var $this DController */
/* @var $model Dcottipo */

$this->breadcrumbs=array(
	'Dcottipos'=>array('index'),
	$model->codtipo=>array('view','id'=>$model->codtipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dcottipo', 'url'=>array('index')),
	array('label'=>'Create Dcottipo', 'url'=>array('create')),
	array('label'=>'View Dcottipo', 'url'=>array('view', 'id'=>$model->codtipo)),
	array('label'=>'Manage Dcottipo', 'url'=>array('admin')),
);
?>

<h1>Update Dcottipo <?php echo $model->codtipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>