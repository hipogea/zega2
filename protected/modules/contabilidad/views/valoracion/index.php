<?php
/* @var $this ValoracionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Catvaloracions',
);

$this->menu=array(
	array('label'=>'Create Catvaloracion', 'url'=>array('create')),
	array('label'=>'Manage Catvaloracion', 'url'=>array('admin')),
);
?>

<h1>Catvaloracions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
