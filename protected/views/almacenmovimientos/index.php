<?php
/* @var $this AlmacenmovimientosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Almacenmovimientoses',
);

$this->menu=array(
	array('label'=>'Create Almacenmovimientos', 'url'=>array('create')),
	array('label'=>'Manage Almacenmovimientos', 'url'=>array('admin')),
);
?>

<h1>Almacenmovimientoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
