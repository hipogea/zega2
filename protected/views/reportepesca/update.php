<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */

$this->breadcrumbs=array(
	'Reportepescas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reportepesca', 'url'=>array('index')),
	array('label'=>'Create Reportepesca', 'url'=>array('create')),
	array('label'=>'View Reportepesca', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reportepesca', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>