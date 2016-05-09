<?php
/* @var $this CanalesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Canales',
);

$this->menu=array(
	array('label'=>'Create Canales', 'url'=>array('create')),
	array('label'=>'Manage Canales', 'url'=>array('admin')),
);
?>

<h1>Canales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
