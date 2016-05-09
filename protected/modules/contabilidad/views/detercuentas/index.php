<?php
/* @var $this DetercuentasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detercuentases',
);

$this->menu=array(
	array('label'=>'Create Detercuentas', 'url'=>array('create')),
	array('label'=>'Manage Detercuentas', 'url'=>array('admin')),
);
?>

<h1>Detercuentases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
