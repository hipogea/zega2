<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */

$this->breadcrumbs=array(
	'Grupoplans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grupoplan', 'url'=>array('index')),
	array('label'=>'Manage Grupoplan', 'url'=>array('admin')),
);
?>

<h1>Create Grupoplan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>