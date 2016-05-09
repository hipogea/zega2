<?php
/* @var $this MotMaterialesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mot Materiales',
);

$this->menu=array(
	array('label'=>'Create MotMateriales', 'url'=>array('create')),
	array('label'=>'Manage MotMateriales', 'url'=>array('admin')),
);
?>

<h1>Mot Materiales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
