<?php
/* @var $this TenoresController */
/* @var $model Tenores */

$this->breadcrumbs=array(
	'Tenores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tenores', 'url'=>array('index')),
	array('label'=>'Manage Tenores', 'url'=>array('admin')),
);
?>

<h1>Create Tenores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>