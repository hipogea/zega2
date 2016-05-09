<?php
/* @var $this DireccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Direcciones',
);

$this->menu=array(
	array('label'=>'Create Direcciones', 'url'=>array('create')),
	array('label'=>'Manage Direcciones', 'url'=>array('admin')),
);
?>

<h1>Direcciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
