<?php
/* @var $this LibroobraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Libroobras',
);

$this->menu=array(
	array('label'=>'Create Libroobra', 'url'=>array('create')),
	array('label'=>'Manage Libroobra', 'url'=>array('admin')),
);
?>

<h1>Libroobras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
