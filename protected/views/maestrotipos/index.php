<?php
/* @var $this MaestrotiposController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestrotiposes',
);

$this->menu=array(
	array('label'=>'Create Maestrotipos', 'url'=>array('create')),
	array('label'=>'Manage Maestrotipos', 'url'=>array('admin')),
);
?>

<h1>Maestrotiposes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
