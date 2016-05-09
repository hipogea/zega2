<?php
/* @var $this TipoactivosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipoactivoses',
);

$this->menu=array(
	array('label'=>'Create Tipoactivos', 'url'=>array('create')),
	array('label'=>'Manage Tipoactivos', 'url'=>array('admin')),
);
?>

<h1>Tipoactivoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
