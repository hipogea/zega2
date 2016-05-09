<?php
/* @var $this SolcotizacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solcotizacions',
);

$this->menu=array(
	array('label'=>'Create Solcotizacion', 'url'=>array('create')),
	array('label'=>'Manage Solcotizacion', 'url'=>array('admin')),
);
?>

<h1>Solcotizacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
