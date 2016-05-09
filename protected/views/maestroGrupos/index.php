<?php
/* @var $this MaestrogruposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestrogruposes',
);

$this->menu=array(
	array('label'=>'Create Maestrogrupos', 'url'=>array('create')),
	array('label'=>'Manage Maestrogrupos', 'url'=>array('admin')),
);
?>

<h1>Maestrogruposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
