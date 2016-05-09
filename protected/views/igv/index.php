<?php
/* @var $this IgvController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Igvs',
);

$this->menu=array(
	array('label'=>'Create Igv', 'url'=>array('create')),
	array('label'=>'Manage Igv', 'url'=>array('admin')),
);
?>

<h1>Igvs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
