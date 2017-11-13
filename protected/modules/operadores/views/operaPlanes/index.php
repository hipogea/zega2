<?php
/* @var $this OperaPlanesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opera Planes',
);

$this->menu=array(
	array('label'=>'Create OperaPlanes', 'url'=>array('create')),
	array('label'=>'Manage OperaPlanes', 'url'=>array('admin')),
);
?>

<h1>Opera Planes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
