<?php
/* @var $this EmbarcacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Embarcaciones',
);

$this->menu=array(
	array('label'=>'Create Embarcaciones', 'url'=>array('create')),
	array('label'=>'Manage Embarcaciones', 'url'=>array('admin')),
);
?>

<h1>Embarcaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
