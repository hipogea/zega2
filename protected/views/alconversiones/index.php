<?php
/* @var $this AlconversionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alconversiones',
);

$this->menu=array(
	array('label'=>'Create Alconversiones', 'url'=>array('create')),
	array('label'=>'Manage Alconversiones', 'url'=>array('admin')),
);
?>

<h1>Alconversiones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
