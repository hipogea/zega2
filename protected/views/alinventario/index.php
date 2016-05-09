<?php
/* @var $this AlinventarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alinventarios',
);

$this->menu=array(
	array('label'=>'Create Alinventario', 'url'=>array('create')),
	array('label'=>'Manage Alinventario', 'url'=>array('admin')),
);
?>

<h1>Alinventarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
