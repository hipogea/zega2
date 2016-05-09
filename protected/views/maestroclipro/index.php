<?php
/* @var $this MaestrocliproController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestroclipros',
);

$this->menu=array(
	array('label'=>'Create Maestroclipro', 'url'=>array('create')),
	array('label'=>'Manage Maestroclipro', 'url'=>array('admin')),
);
?>

<h1>Maestroclipros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
