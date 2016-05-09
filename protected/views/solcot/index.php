<?php
/* @var $this SolcotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solcots',
);

$this->menu=array(
	array('label'=>'Create Solcot', 'url'=>array('create')),
	array('label'=>'Manage Solcot', 'url'=>array('admin')),
);
?>

<h1>Solcots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
