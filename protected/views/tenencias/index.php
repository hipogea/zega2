<?php
/* @var $this TenenciasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tenenciases',
);

$this->menu=array(
	array('label'=>'Create Tenencias', 'url'=>array('create')),
	array('label'=>'Manage Tenencias', 'url'=>array('admin')),
);
?>

<h1>Tenenciases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
