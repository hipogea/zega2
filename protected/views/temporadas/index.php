<?php
/* @var $this TemporadasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temporadases',
);

$this->menu=array(
	array('label'=>'Create Temporadas', 'url'=>array('create')),
	array('label'=>'Manage Temporadas', 'url'=>array('admin')),
);
?>

<h1>Temporadases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
