<?php
/* @var $this DcajachicaController */
/* @var $model Dcajachica */

$this->breadcrumbs=array(
	'Dcajachicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dcajachica', 'url'=>array('index')),
	array('label'=>'Manage Dcajachica', 'url'=>array('admin')),
);
?>

<h1>Create Dcajachica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>