<?php
/* @var $this ObrasController */
/* @var $model Obras */

$this->breadcrumbs=array(
	'Obrases'=>array('index'),
	$model->idobra=>array('view','id'=>$model->idobra),
	'Update',
);

$this->menu=array(
	array('label'=>'List Obras', 'url'=>array('index')),
	array('label'=>'Create Obras', 'url'=>array('create')),
	array('label'=>'View Obras', 'url'=>array('view', 'id'=>$model->idobra)),
	array('label'=>'Manage Obras', 'url'=>array('admin')),
);
?>

<h1>Update Obras <?php echo $model->idobra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>