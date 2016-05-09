<?php
/* @var $this TenoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tenores',
);

$this->menu=array(
	array('label'=>'Create Tenores', 'url'=>array('create')),
	array('label'=>'Manage Tenores', 'url'=>array('admin')),
);
?>

<h1>Tenores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
