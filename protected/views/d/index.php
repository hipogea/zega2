<?php
/* @var $this DController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dcottipos',
);

$this->menu=array(
	array('label'=>'Create Dcottipo', 'url'=>array('create')),
	array('label'=>'Manage Dcottipo', 'url'=>array('admin')),
);
?>

<h1>Dcottipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
