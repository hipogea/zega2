<?php
/* @var $this IngfacturaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ingfacturas',
);

$this->menu=array(
	array('label'=>'Create Ingfactura', 'url'=>array('create')),
	array('label'=>'Manage Ingfactura', 'url'=>array('admin')),
);
?>

<h1>Ingfacturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
