<?php
/* @var $this CarteresController */
/* @var $model Carteres */

$this->breadcrumbs=array(
	'Carteres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Carteres', 'url'=>array('index')),
	array('label'=>'Manage Carteres', 'url'=>array('admin')),
);
?>

<h1>Create Carteres</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>