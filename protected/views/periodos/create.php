<?php
/* @var $this PeriodosController */
/* @var $model Periodos */

$this->breadcrumbs=array(
	'Periodoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Periodos', 'url'=>array('index')),
	array('label'=>'Manage Periodos', 'url'=>array('admin')),
);
?>

<h1>Create Periodos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>