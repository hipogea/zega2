<?php
/* @var $this FondofijoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fondofijos',
);

$this->menu=array(
	array('label'=>'Create Fondofijo', 'url'=>array('create')),
	array('label'=>'Manage Fondofijo', 'url'=>array('admin')),
);
?>

<h1>Fondofijos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
