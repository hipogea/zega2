<?php
/* @var $this MotMaterialesController */
/* @var $model MotMateriales */

$this->breadcrumbs=array(
	'Mot Materiales'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MotMateriales', 'url'=>array('index')),
	array('label'=>'Manage MotMateriales', 'url'=>array('admin')),
);
?>

<h1>Create MotMateriales</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>