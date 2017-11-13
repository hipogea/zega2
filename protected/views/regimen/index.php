<?php
/* @var $this RegimenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regimens',
);

$this->menu=array(
	array('label'=>'Create Regimen', 'url'=>array('create')),
	array('label'=>'Manage Regimen', 'url'=>array('admin')),
);
?>

<h1>Regimens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
