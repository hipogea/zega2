<?php
/* @var $this CcGastosController */
/* @var $model CcGastos */

$this->breadcrumbs=array(
	'Cc Gastoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CcGastos', 'url'=>array('index')),
	array('label'=>'Manage CcGastos', 'url'=>array('admin')),
);
?>

<h1>Create CcGastos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>