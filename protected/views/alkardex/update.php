<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */

$this->breadcrumbs=array(
	'Alkardexes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alkardex', 'url'=>array('index')),
	array('label'=>'Create Alkardex', 'url'=>array('create')),
	array('label'=>'View Alkardex', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alkardex', 'url'=>array('admin')),
);
?>

<h1>Update Alkardex <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>