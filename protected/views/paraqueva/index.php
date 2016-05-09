<?php
/* @var $this ParaquevaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Paraquevas',
);

$this->menu=array(
	array('label'=>'Create Paraqueva', 'url'=>array('create')),
	array('label'=>'Manage Paraqueva', 'url'=>array('admin')),
);
?>

<h1>Paraquevas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
