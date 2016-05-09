<?php
/* @var $this CotiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cotis',
);

$this->menu=array(
	array('label'=>'Create Coti', 'url'=>array('create')),
	array('label'=>'Manage Coti', 'url'=>array('admin')),
);
?>

<h1>Cotis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
