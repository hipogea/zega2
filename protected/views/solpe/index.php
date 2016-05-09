<?php
/* @var $this SolpeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solpes',
);

$this->menu=array(
	array('label'=>'Create Solpe', 'url'=>array('create')),
	array('label'=>'Manage Solpe', 'url'=>array('admin')),
);
?>

<h1>Solpes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
