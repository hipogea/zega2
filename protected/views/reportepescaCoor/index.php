<?php
/* @var $this ReportepescaCoorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reportepesca Coors',
);

$this->menu=array(
	array('label'=>'Create ReportepescaCoor', 'url'=>array('create')),
	array('label'=>'Manage ReportepescaCoor', 'url'=>array('admin')),
);
?>

<h1>Reportepesca Coors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
