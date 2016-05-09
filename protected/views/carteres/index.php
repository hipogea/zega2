<?php
/* @var $this CarteresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carteres',
);

$this->menu=array(
	array('label'=>'Create Carteres', 'url'=>array('create')),
	array('label'=>'Manage Carteres', 'url'=>array('admin')),
);
?>

<h1>Carteres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
