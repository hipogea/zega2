<?php
/* @var $this OpcionescamposdocuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opcionescamposdocus',
);

$this->menu=array(
	array('label'=>'Create Opcionescamposdocu', 'url'=>array('create')),
	array('label'=>'Manage Opcionescamposdocu', 'url'=>array('admin')),
);
?>

<h1>Opcionescamposdocus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
