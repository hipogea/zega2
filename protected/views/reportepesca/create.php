<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */

$this->breadcrumbs=array(
	'Reportepescas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reportepesca', 'url'=>array('index')),
	array('label'=>'Manage Reportepesca', 'url'=>array('admin')),
);
?>

<h1>Create Reportepesca</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>