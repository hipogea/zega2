<?php
/* @var $this ControlActivosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Control Activoses',
);

$this->menu=array(
	array('label'=>'Create ControlActivos', 'url'=>array('create')),
	array('label'=>'Manage ControlActivos', 'url'=>array('admin')),
);
?>

<h1>Control Activoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
