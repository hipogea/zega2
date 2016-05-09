<?php
/* @var $this DetcargosController */
/* @var $model Detcargos */

$this->breadcrumbs=array(
	'Detcargoses'=>array('index'),
	$model->iddetcargo=>array('view','id'=>$model->iddetcargo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Detcargos', 'url'=>array('index')),
	array('label'=>'Create Detcargos', 'url'=>array('create')),
	array('label'=>'View Detcargos', 'url'=>array('view', 'id'=>$model->iddetcargo)),
	array('label'=>'Manage Detcargos', 'url'=>array('admin')),
);
?>

<h1>Update Detcargos <?php echo $model->iddetcargo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>