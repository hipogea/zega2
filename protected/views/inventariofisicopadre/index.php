<?php
/* @var $this InventariofisicopadreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inventariofisicopadres',
);

$this->menu=array(
	array('label'=>'Create Inventariofisicopadre', 'url'=>array('create')),
	array('label'=>'Manage Inventariofisicopadre', 'url'=>array('admin')),
);
?>

<h1>Inventariofisicopadres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
