<?php
/* @var $this GrupocomprasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupocomprases',
);

$this->menu=array(
	array('label'=>'Create Grupocompras', 'url'=>array('create')),
	array('label'=>'Manage Grupocompras', 'url'=>array('admin')),
);
?>

<h1>Grupocomprases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
