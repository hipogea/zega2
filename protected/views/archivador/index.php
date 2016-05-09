<?php
/* @var $this ArchivadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Archivadors',
);

$this->menu=array(
	array('label'=>'Create Archivador', 'url'=>array('create')),
	array('label'=>'Manage Archivador', 'url'=>array('admin')),
);
?>

<h1>Archivadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
