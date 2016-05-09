<?php
/* @var $this OficiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Oficioses',
);

$this->menu=array(
	array('label'=>'Create Oficios', 'url'=>array('create')),
	array('label'=>'Manage Oficios', 'url'=>array('admin')),
);
?>

<h1>Oficioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
