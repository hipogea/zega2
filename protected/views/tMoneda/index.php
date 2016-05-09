<?php
/* @var $this TMonedaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tmonedas',
);

$this->menu=array(
	array('label'=>'Create TMoneda', 'url'=>array('create')),
	array('label'=>'Manage TMoneda', 'url'=>array('admin')),
);
?>

<h1>Tmonedas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
