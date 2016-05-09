<?php
/* @var $this GrupoccController */
/* @var $model Grupocc */

$this->breadcrumbs=array(
	'Grupoccs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grupocc', 'url'=>array('index')),
	array('label'=>'Manage Grupocc', 'url'=>array('admin')),
);
?>

<h1>Create Grupocc</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>