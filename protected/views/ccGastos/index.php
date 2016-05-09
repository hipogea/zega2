<?php
/* @var $this CcGastosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cc Gastoses',
);

$this->menu=array(
	array('label'=>'Create CcGastos', 'url'=>array('create')),
	array('label'=>'Manage CcGastos', 'url'=>array('admin')),
);
?>

<h1>Cc Gastoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
