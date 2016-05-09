<?php
/* @var $this FacturController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturs',
);

$this->menu=array(
	array('label'=>'Create Factur', 'url'=>array('create')),
	array('label'=>'Manage Factur', 'url'=>array('admin')),
);
?>

<h1>Facturs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
