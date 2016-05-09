<?php
/* @var $this LoginventarioController */
/* @var $model Loginventario */

$this->breadcrumbs=array(
	'Loginventarios'=>array('index'),
	$model->idlog=>array('view','id'=>$model->idlog),
	'Update',
);

$this->menu=array(
	array('label'=>'List Loginventario', 'url'=>array('index')),
	array('label'=>'Create Loginventario', 'url'=>array('create')),
	array('label'=>'View Loginventario', 'url'=>array('view', 'id'=>$model->idlog)),
	array('label'=>'Manage Loginventario', 'url'=>array('admin')),
);
?>

<h1>Update Loginventario <?php echo $model->idlog; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>