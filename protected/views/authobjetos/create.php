<?php
/* @var $this AuthobjetosController */
/* @var $model Authobjetos */

$this->breadcrumbs=array(
	'Authobjetoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Authobjetos', 'url'=>array('index')),
	array('label'=>'Manage Authobjetos', 'url'=>array('admin')),
);
?>

<h1>Create Authobjetos</h1>

<?php $this->renderPartial('_formulario', array('model'=>$model)); ?>