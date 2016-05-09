<?php
/* @var $this BorrarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Borrars',
);

$this->menu=array(
	array('label'=>'Create Borrar', 'url'=>array('create')),
	array('label'=>'Manage Borrar', 'url'=>array('admin')),
);
?>

<h1>Borrars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
