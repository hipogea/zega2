<?php
/* @var $this PescatercerosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pescaterceroses',
);

$this->menu=array(
	array('label'=>'Create Pescaterceros', 'url'=>array('create')),
	array('label'=>'Manage Pescaterceros', 'url'=>array('admin')),
);
?>

<h1>Pescaterceroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
