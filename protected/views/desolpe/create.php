<?php
/* @var $this DesolpeController */
/* @var $model Desolpe */

$this->breadcrumbs=array(
	'Desolpes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Desolpe', 'url'=>array('index')),
	array('label'=>'Manage Desolpe', 'url'=>array('admin')),
);
?>

<h1>Create Desolpe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>