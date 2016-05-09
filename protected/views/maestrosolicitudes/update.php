<?php
/* @var $this MaestrosolicitudesController */
/* @var $model Maestrosolicitudes */

$this->breadcrumbs=array(
	'Maestrosolicitudes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Maestrosolicitudes', 'url'=>array('index')),
	array('label'=>'Create Maestrosolicitudes', 'url'=>array('create')),
	array('label'=>'View Maestrosolicitudes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Maestrosolicitudes', 'url'=>array('admin')),
);
?>

<h1>Update Maestrosolicitudes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>