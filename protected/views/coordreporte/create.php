<?php
/* @var $this CoordreporteController */
/* @var $model Coordreporte */

$this->breadcrumbs=array(
	'Coordreportes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coordreporte', 'url'=>array('index')),
	array('label'=>'Manage Coordreporte', 'url'=>array('admin')),
);
?>

<h1>Create Coordreporte</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>