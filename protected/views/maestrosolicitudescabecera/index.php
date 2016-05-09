<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestrosolicitudescabeceras',
);

$this->menu=array(
	array('label'=>'Create Maestrosolicitudescabecera', 'url'=>array('create')),
	array('label'=>'Manage Maestrosolicitudescabecera', 'url'=>array('admin')),
);
?>

<h1>Maestrosolicitudescabeceras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
