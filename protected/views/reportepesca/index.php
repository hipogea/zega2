<?php
/* @var $this ReportepescaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reportepescas',
);

$this->menu=array(
	array('label'=>'Create Reportepesca', 'url'=>array('create')),
	array('label'=>'Manage Reportepesca', 'url'=>array('admin')),
);
?>

<h1>Reportepescas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
