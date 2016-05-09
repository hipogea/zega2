<?php
/* @var $this DesolpeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Desolpes',
);

$this->menu=array(
	array('label'=>'Create Desolpe', 'url'=>array('create')),
	array('label'=>'Manage Desolpe', 'url'=>array('admin')),
);
?>

<h1>Desolpes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
