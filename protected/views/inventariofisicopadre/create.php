<?php
/* @var $this InventariofisicopadreController */
/* @var $model Inventariofisicopadre */

$this->breadcrumbs=array(
	'Inventariofisicopadres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Inventariofisicopadre', 'url'=>array('index')),
	array('label'=>'Manage Inventariofisicopadre', 'url'=>array('admin')),
);
?>

<h1>Create Inventariofisicopadre</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>