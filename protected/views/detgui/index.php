<?php
/* @var $this DetguiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detguis',
);

$this->menu=array(
	array('label'=>'Create Detgui', 'url'=>array('create')),
	array('label'=>'Manage Detgui', 'url'=>array('admin')),
);
?>

<h1>Detguis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
