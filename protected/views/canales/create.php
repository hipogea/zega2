<?php
/* @var $this CanalesController */
/* @var $model Canales */

$this->breadcrumbs=array(
	'Canales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Canales', 'url'=>array('index')),
	array('label'=>'Manage Canales', 'url'=>array('admin')),
);
?>

<h1>Create Canales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>