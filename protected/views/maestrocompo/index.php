<?php
/* @var $this MaestrocompoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestrocompos',
);

$this->menu=array(
	array('label'=>'Create Maestrocompo', 'url'=>array('create')),
	array('label'=>'Manage Maestrocompo', 'url'=>array('admin')),
);
?>

<h1>Maestrocompos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
