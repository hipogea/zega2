<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	$model->idguia=>array('view','id'=>$model->idguia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coti', 'url'=>array('index')),
	array('label'=>'Create Coti', 'url'=>array('create')),
	array('label'=>'View Coti', 'url'=>array('view', 'id'=>$model->idguia)),
	array('label'=>'Manage Coti', 'url'=>array('admin')),
);
?>

<h1>Update Coti <?php echo $model->idguia; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>