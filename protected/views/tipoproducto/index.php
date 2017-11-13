<?php
/* @var $this TipoproductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas Tipoproductos',
);

$this->menu=array(
	array('label'=>'Create VentasTipoproducto', 'url'=>array('create')),
	array('label'=>'Manage VentasTipoproducto', 'url'=>array('admin')),
);
?>

<h1>Ventas Tipoproductos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
