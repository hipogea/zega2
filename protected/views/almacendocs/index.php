<?php
/* @var $this AlmacendocsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Almacendocs',
);

$this->menu=array(
	array('label'=>'Create Almacendocs', 'url'=>array('create')),
	array('label'=>'Manage Almacendocs', 'url'=>array('admin')),
);
?>

<h1>Almacendocs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
