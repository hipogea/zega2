<?php
/* @var $this CoordocsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coordocs',
);

$this->menu=array(
	array('label'=>'Create Coordocs', 'url'=>array('create')),
	array('label'=>'Manage Coordocs', 'url'=>array('admin')),
);
?>

<h1>Coordocs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
