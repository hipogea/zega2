<?php
/* @var $this DetguiController */
/* @var $model Detgui */

$this->breadcrumbs=array(
	'Detguis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Detgui', 'url'=>array('index')),
	array('label'=>'Manage Detgui', 'url'=>array('admin')),
);
?>

<h1>Create Detgui</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>