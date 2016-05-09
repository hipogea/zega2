<?php
/* @var $this DetguiController */
/* @var $model Detgui */

$this->breadcrumbs=array(
	'Detguis'=>array('index'),
	$model->n_detgui=>array('view','id'=>$model->n_detgui),
	'Update',
);

$this->menu=array(
	array('label'=>'List Detgui', 'url'=>array('index')),
	array('label'=>'Create Detgui', 'url'=>array('create')),
	array('label'=>'View Detgui', 'url'=>array('view', 'id'=>$model->n_detgui)),
	array('label'=>'Manage Detgui', 'url'=>array('admin')),
);
?>

<h1>Update Detgui <?php echo $model->n_detgui; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>