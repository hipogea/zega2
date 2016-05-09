<?php
/* @var $this MotController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mots',
);

$this->menu=array(
	array('label'=>'Create Mot', 'url'=>array('create')),
	array('label'=>'Manage Mot', 'url'=>array('admin')),
);
?>

<h1>Mots</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
