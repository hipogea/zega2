<?php
/* @var $this ObrasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Obrases',
);

$this->menu=array(
	array('label'=>'Create Obras', 'url'=>array('create')),
	array('label'=>'Manage Obras', 'url'=>array('admin')),
);
?>

<h1>Obrases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
