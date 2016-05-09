<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */

$this->breadcrumbs=array(
	'Alinventarios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Create Alinventario', 'url'=>array('create')),
	array('label'=>'View Alinventario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alinventario', 'url'=>array('admin')),
);
?>

<h1>Update Alinventario <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>