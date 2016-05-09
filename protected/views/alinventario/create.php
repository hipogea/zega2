<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */

$this->breadcrumbs=array(
	'Alinventarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Manage Alinventario', 'url'=>array('admin')),
);
?>

<h1>Create Alinventario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>