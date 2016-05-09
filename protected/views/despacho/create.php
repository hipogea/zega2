<?php
/* @var $this DespachoController */
/* @var $model Despacho */

$this->breadcrumbs=array(
	'Despachos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Despacho', 'url'=>array('index')),
	array('label'=>'Manage Despacho', 'url'=>array('admin')),
);
?>

<h1>Create Despacho</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>