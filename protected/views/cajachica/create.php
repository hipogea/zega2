<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */

$this->breadcrumbs=array(
	'Cajachicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cajachica', 'url'=>array('index')),
	array('label'=>'Manage Cajachica', 'url'=>array('admin')),
);
?>

<h1>Create Cajachica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>