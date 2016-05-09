<?php
/* @var $this UmsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ums',
);

$this->menu=array(
	array('label'=>'Create Ums', 'url'=>array('create')),
	array('label'=>'Manage Ums', 'url'=>array('admin')),
);
?>

<h1>Ums</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
