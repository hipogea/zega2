<?php
/* @var $this CmotivoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cmotivos',
);

$this->menu=array(
	array('label'=>'Create CMotivo', 'url'=>array('create')),
	array('label'=>'Manage CMotivo', 'url'=>array('admin')),
);
?>

<h1>Cmotivos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
