<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */

$this->breadcrumbs=array(
	'Coordocs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coordocs', 'url'=>array('index')),
	array('label'=>'Create Coordocs', 'url'=>array('create')),
	array('label'=>'View Coordocs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coordocs', 'url'=>array('admin')),
);
?>

<h1>Update Coordocs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>