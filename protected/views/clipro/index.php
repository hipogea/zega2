<?php
/* @var $this CliproController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clipros',
);

$this->menu=array(
	array('label'=>'Create Clipro', 'url'=>array('create')),
	array('label'=>'Manage Clipro', 'url'=>array('admin')),
);
?>

<h1>Clipros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
