<?php
/* @var $this ChoferesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Choferes',
);

$this->menu=array(
	array('label'=>'Create Choferes', 'url'=>array('create')),
	array('label'=>'Manage Choferes', 'url'=>array('admin')),
);
?>

<h1>Choferes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
