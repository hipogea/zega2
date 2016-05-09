<?php
/* @var $this NovedadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Novedades',
);

$this->menu=array(
	array('label'=>'Create Novedades', 'url'=>array('create')),
	array('label'=>'Manage Novedades', 'url'=>array('admin')),
);
?>

<h1>Novedades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
