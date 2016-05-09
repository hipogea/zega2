<?php
/* @var $this ValorimpuestosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Valorimpuestoses',
);

$this->menu=array(
	array('label'=>'Create Valorimpuestos', 'url'=>array('create')),
	array('label'=>'Manage Valorimpuestos', 'url'=>array('admin')),
);
?>

<h1>Valorimpuestoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
