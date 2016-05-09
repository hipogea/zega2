<?php
/* @var $this TipofacturacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipofacturacions',
);

$this->menu=array(
	array('label'=>'Create Tipofacturacion', 'url'=>array('create')),
	array('label'=>'Manage Tipofacturacion', 'url'=>array('admin')),
);
?>

<h1>Tipofacturacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
