<?php
/* @var $this DailyworkController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dailyworks',
);

$this->menu=array(
	array('label'=>'Create Dailywork', 'url'=>array('create')),
	array('label'=>'Manage Dailywork', 'url'=>array('admin')),
);
?>

<h1>Dailyworks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
