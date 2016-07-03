<?php
/* @var $this GrupoplanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupoplans',
);

$this->menu=array(
	array('label'=>'Create Grupoplan', 'url'=>array('create')),
	array('label'=>'Manage Grupoplan', 'url'=>array('admin')),
);
?>

<h1>Grupoplans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
