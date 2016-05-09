<?php
/* @var $this DesolpeController */
/* @var $model Desolpe */

$this->breadcrumbs=array(
	'Desolpes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Desolpe', 'url'=>array('index')),
	array('label'=>'Create Desolpe', 'url'=>array('create')),
	array('label'=>'View Desolpe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Desolpe', 'url'=>array('admin')),
);
?>

<h1>Update Desolpe <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>