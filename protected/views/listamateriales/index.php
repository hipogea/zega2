<?php
/* @var $this ListamaterialesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Listamateriales',
);

$this->menu=array(
	array('label'=>'Create Listamateriales', 'url'=>array('create')),
	array('label'=>'Manage Listamateriales', 'url'=>array('admin')),
);
?>

<h1>Listamateriales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
