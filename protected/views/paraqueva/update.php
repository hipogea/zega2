<?php
/* @var $this ParaquevaController */
/* @var $model Paraqueva */

$this->breadcrumbs=array(
	'Paraquevas'=>array('index'),
	$model->cmotivo=>array('view','id'=>$model->cmotivo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Paraqueva', 'url'=>array('index')),
	array('label'=>'Create Paraqueva', 'url'=>array('create')),
	array('label'=>'View Paraqueva', 'url'=>array('view', 'id'=>$model->cmotivo)),
	array('label'=>'Manage Paraqueva', 'url'=>array('admin')),
);
?>

<h1>Update Paraqueva <?php echo $model->cmotivo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>