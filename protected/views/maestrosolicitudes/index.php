<?php
/* @var $this MaestrosolicitudesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestrosolicitudes',
);

$this->menu=array(
	array('label'=>'Create Maestrosolicitudes', 'url'=>array('create')),
	array('label'=>'Manage Maestrosolicitudes', 'url'=>array('admin')),
);
?>

<h1>Maestrosolicitudes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
