<?php
/* @var $this DespachoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Despachos',
);

$this->menu=array(
	array('label'=>'Create Despacho', 'url'=>array('create')),
	array('label'=>'Manage Despacho', 'url'=>array('admin')),
);
?>

<h1>Despachos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
