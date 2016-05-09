<?php
/* @var $this CcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ccs',
);

$this->menu=array(
	array('label'=>'Create Cc', 'url'=>array('create')),
	array('label'=>'Manage Cc', 'url'=>array('admin')),
);
?>

<h1>Ccs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
