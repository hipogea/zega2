<?php
/* @var $this MotMatDetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mot Mat Dets',
);

$this->menu=array(
	array('label'=>'Create MotMatDet', 'url'=>array('create')),
	array('label'=>'Manage MotMatDet', 'url'=>array('admin')),
);
?>

<h1>Mot Mat Dets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
