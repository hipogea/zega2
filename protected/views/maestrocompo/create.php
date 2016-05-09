<?php
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */

$this->breadcrumbs=array(
	'Maestrocompos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'', 'url'=>array('index')),
	array('label'=>'Lista', 'url'=>array('admin')),
);
?>

<h1>Crear material</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>