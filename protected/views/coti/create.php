<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coti', 'url'=>array('index')),
	array('label'=>'Manage Coti', 'url'=>array('admin')),
);
?>

<h1>Create Coti</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>