<?php
/* @var $this OperacionesbarraController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Operacionesbarras',
);

$this->menu=array(
	array('label'=>'Create Operacionesbarra', 'url'=>array('create')),
	array('label'=>'Manage Operacionesbarra', 'url'=>array('admin')),
);
?>

<h1>Operacionesbarras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
