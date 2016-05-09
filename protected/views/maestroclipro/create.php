<?php
/* @var $this MaestrocliproController */
/* @var $model Maestroclipro */

$this->breadcrumbs=array(
	'Maestroclipros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Maestroclipro', 'url'=>array('index')),
	array('label'=>'Manage Maestroclipro', 'url'=>array('admin')),
);
?>

<h1>Create Maestroclipro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>