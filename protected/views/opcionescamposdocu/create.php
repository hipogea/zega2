<?php
/* @var $this OpcionescamposdocuController */
/* @var $model Opcionescamposdocu */

$this->breadcrumbs=array(
	'Opcionescamposdocus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Opcionescamposdocu', 'url'=>array('index')),
	array('label'=>'Manage Opcionescamposdocu', 'url'=>array('admin')),
);
?>

<h1>Create Opcionescamposdocu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>