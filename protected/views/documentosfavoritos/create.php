<?php
/* @var $this DocumentosfavoritosController */
/* @var $model Documentosfavoritos */

$this->breadcrumbs=array(
	'Documentosfavoritoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Documentosfavoritos', 'url'=>array('index')),
	array('label'=>'Manage Documentosfavoritos', 'url'=>array('admin')),
);
?>

<h1>Create Documentosfavoritos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>