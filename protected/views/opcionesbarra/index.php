<?php
/* @var $this OpcionesbarraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opcionesbarras',
);

$this->menu=array(
	array('label'=>'Create Opcionesbarra', 'url'=>array('create')),
	array('label'=>'Manage Opcionesbarra', 'url'=>array('admin')),
);
?>

<h1>Opcionesbarras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
