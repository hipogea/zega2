<?php
/* @var $this OtController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ots',
);

$this->menu=array(
	array('label'=>'Create Ot', 'url'=>array('create')),
	array('label'=>'Manage Ot', 'url'=>array('admin')),
);
?>

<h1>Ots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
