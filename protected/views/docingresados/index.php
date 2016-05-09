<?php
/* @var $this DocingresadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Docingresadoses',
);

$this->menu=array(
	array('label'=>'Create Docingresados', 'url'=>array('create')),
	array('label'=>'Manage Docingresados', 'url'=>array('admin')),
);
?>

<h1>Docingresadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
