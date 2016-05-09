<?php
/* @var $this ParaquevaController */
/* @var $model Paraqueva */

$this->breadcrumbs=array(
	'Paraquevas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Paraqueva', 'url'=>array('index')),
	array('label'=>'Manage Paraqueva', 'url'=>array('admin')),
);
?>

<h1>Create Paraqueva</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>