<?php
/* @var $this SeleccionableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seleccionables',
);

$this->menu=array(
	array('label'=>'Create Seleccionable', 'url'=>array('create')),
	array('label'=>'Manage Seleccionable', 'url'=>array('admin')),
);
?>

<h1>Seleccionables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
