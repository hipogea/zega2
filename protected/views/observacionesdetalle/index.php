<?php
/* @var $this ObservacionesdetalleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Observacionesdetalles',
);

$this->menu=array(
	array('label'=>'Create Observacionesdetalle', 'url'=>array('create')),
	array('label'=>'Manage Observacionesdetalle', 'url'=>array('admin')),
);
?>

<h1>Observacionesdetalles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
