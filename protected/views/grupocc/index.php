<?php
/* @var $this GrupoccController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupoccs',
);

$this->menu=array(
	array('label'=>'Create Grupocc', 'url'=>array('create')),
	array('label'=>'Manage Grupocc', 'url'=>array('admin')),
);
?>

<h1>Grupoccs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
