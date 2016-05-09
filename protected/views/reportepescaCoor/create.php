<?php
/* @var $this ReportepescaCoorController */
/* @var $model ReportepescaCoor */

$this->breadcrumbs=array(
	'Reportepesca Coors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportepescaCoor', 'url'=>array('index')),
	array('label'=>'Manage ReportepescaCoor', 'url'=>array('admin')),
);
?>

<h1>Create ReportepescaCoor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>