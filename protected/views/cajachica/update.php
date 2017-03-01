<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */

$this->breadcrumbs=array(
	'Cajachicas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cajachica', 'url'=>array('index')),
	array('label'=>'Create Cajachica', 'url'=>array('create')),
	array('label'=>'View Cajachica', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cajachica', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo("Editar Caja ", "basket")?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>