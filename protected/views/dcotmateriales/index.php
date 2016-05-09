<?php
/* @var $this DcotmaterialesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dcotmateriales',
);

$this->menu=array(
	array('label'=>'Create Dcotmateriales', 'url'=>array('create')),
	array('label'=>'Manage Dcotmateriales', 'url'=>array('admin')),
);
?>

<h1>Dcotmateriales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
