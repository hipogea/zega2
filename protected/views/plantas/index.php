<?php
/* @var $this PlantasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plantases',
);

$this->menu=array(
	array('label'=>'Create Plantas', 'url'=>array('create')),
	array('label'=>'Manage Plantas', 'url'=>array('admin')),
);
?>

<h1>Plantases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
