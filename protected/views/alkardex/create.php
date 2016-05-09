<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */

$this->breadcrumbs=array(
	'Alkardexes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alkardex', 'url'=>array('index')),
	array('label'=>'Manage Alkardex', 'url'=>array('admin')),
);
?>

<h1>Create Alkardex</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>