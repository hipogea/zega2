<?php
/* @var $this ImpuestosdocuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Impuestosdocus',
);

$this->menu=array(
	array('label'=>'Create Impuestosdocu', 'url'=>array('create')),
	array('label'=>'Manage Impuestosdocu', 'url'=>array('admin')),
);
?>

<h1>Impuestosdocus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
