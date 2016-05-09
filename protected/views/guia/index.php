<?php
/* @var $this GuiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Guias',
);

$this->menu=array(
	array('label'=>'Create Guia', 'url'=>array('create')),
	array('label'=>'Manage Guia', 'url'=>array('admin')),
);
?>

<h1>Guias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
