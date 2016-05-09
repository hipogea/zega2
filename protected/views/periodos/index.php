<?php
/* @var $this PeriodosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Periodoses',
);

$this->menu=array(
	array('label'=>'Create Periodos', 'url'=>array('create')),
	array('label'=>'Manage Periodos', 'url'=>array('admin')),
);
?>

<h1>Periodoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
