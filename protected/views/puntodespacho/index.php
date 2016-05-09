<?php
/* @var $this PuntodespachoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puntodespachos',
);

$this->menu=array(
	array('label'=>'Create Puntodespacho', 'url'=>array('create')),
	array('label'=>'Manage Puntodespacho', 'url'=>array('admin')),
);
?>

<h1>Puntodespachos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
