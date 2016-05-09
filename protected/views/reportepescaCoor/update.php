<?php
/* @var $this ReportepescaCoorController */
/* @var $model ReportepescaCoor */

$this->breadcrumbs=array(
	'Reportepesca Coors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportepescaCoor', 'url'=>array('index')),
	array('label'=>'Create ReportepescaCoor', 'url'=>array('create')),
	array('label'=>'View ReportepescaCoor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReportepescaCoor', 'url'=>array('admin')),
);
?>

<h1>Update ReportepescaCoor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>