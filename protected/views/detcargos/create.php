<?php
/* @var $this DetcargosController */
/* @var $model Detcargos */

$this->breadcrumbs=array(
	'Detcargoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Detcargos', 'url'=>array('index')),
	array('label'=>'Manage Detcargos', 'url'=>array('admin')),
);
?>

<h1>Create Detcargos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>