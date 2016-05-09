<?php
/* @var $this FacturController */
/* @var $model Factur */

$this->breadcrumbs=array(
	'Facturs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Factur', 'url'=>array('index')),
	array('label'=>'Manage Factur', 'url'=>array('admin')),
);
?>

<h1>Create Factur</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>