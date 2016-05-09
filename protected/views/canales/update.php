<?php
/* @var $this CanalesController */
/* @var $model Canales */

$this->breadcrumbs=array(
	'Canales'=>array('index'),
	$model->codcanal=>array('view','id'=>$model->codcanal),
	'Update',
);

$this->menu=array(
	array('label'=>'List Canales', 'url'=>array('index')),
	array('label'=>'Create Canales', 'url'=>array('create')),
	array('label'=>'View Canales', 'url'=>array('view', 'id'=>$model->codcanal)),
	array('label'=>'Manage Canales', 'url'=>array('admin')),
);
?>

<h1>Update Canales <?php echo $model->codcanal; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>