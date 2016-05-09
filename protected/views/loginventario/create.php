<?php
/* @var $this LoginventarioController */
/* @var $model Loginventario */

$this->breadcrumbs=array(
	'Loginventarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Loginventario', 'url'=>array('index')),
	array('label'=>'Manage Loginventario', 'url'=>array('admin')),
);
?>

<h1>Create Loginventario</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>