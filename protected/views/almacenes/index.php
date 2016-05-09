<?php
/* @var $this AlmacenesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Almacenes',
);

$this->menu=array(
	array('label'=>'Create Almacenes', 'url'=>array('create')),
	array('label'=>'Manage Almacenes', 'url'=>array('admin')),
);
?>

<h1>Almacenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
