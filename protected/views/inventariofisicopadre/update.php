<?php
/* @var $this InventariofisicopadreController */
/* @var $model Inventariofisicopadre */

$this->breadcrumbs=array(
	'Inventariofisicopadres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Inventariofisicopadre', 'url'=>array('index')),
	array('label'=>'Crear conteo', 'url'=>array('create')),
	//array('label'=>'View Inventariofisicopadre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Editar conteo físico','file'); ?>

<?php $this->renderPartial('_form', array('modelhijo'=>$modelhijo,'model'=>$model)); ?>