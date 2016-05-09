<?php
/* @var $this LoginventarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Loginventarios',
);

$this->menu=array(
	array('label'=>'Create Loginventario', 'url'=>array('create')),
	array('label'=>'Manage Loginventario', 'url'=>array('admin')),
);
?>

<h1>Loginventarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
