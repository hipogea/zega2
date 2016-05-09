<?php
/* @var $this CcController */
/* @var $model Cc */

$this->breadcrumbs=array(
	'Ccs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cc', 'url'=>array('index')),
	array('label'=>'Manage Cc', 'url'=>array('admin')),
);
?>

<h1>Create Cc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>