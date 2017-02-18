<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Comprobantes', 'url'=>array('index')),
	array('label'=>'Manage Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Create Comprobantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>