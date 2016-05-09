<?php
/* @var $this GrupoccController */
/* @var $model Grupocc */

$this->breadcrumbs=array(
	'Grupoccs'=>array('index'),
	$model->codgrupo=>array('view','id'=>$model->codgrupo),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Grupocc', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Grupocc', 'url'=>array('view', 'id'=>$model->codgrupo)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar grupo','update'); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>