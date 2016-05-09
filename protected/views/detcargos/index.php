<?php
/* @var $this DetcargosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Detcargoses',
);

$this->menu=array(
	array('label'=>'Create Detcargos', 'url'=>array('create')),
	array('label'=>'Manage Detcargos', 'url'=>array('admin')),
);
?>

<h1>Detcargoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
