<?php
/* @var $this AlkardexController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alkardexes',
);

$this->menu=array(
	array('label'=>'Create Alkardex', 'url'=>array('create')),
	array('label'=>'Manage Alkardex', 'url'=>array('admin')),
);
?>

<h1>Alkardexes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
