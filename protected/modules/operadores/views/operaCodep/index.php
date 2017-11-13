<?php
/* @var $this OperaCodepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opera Codeps',
);

$this->menu=array(
	array('label'=>'Create OperaCodep', 'url'=>array('create')),
	array('label'=>'Manage OperaCodep', 'url'=>array('admin')),
);
?>

<h1>Opera Codeps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
