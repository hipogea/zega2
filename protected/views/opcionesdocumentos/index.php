<?php
/* @var $this OpcionesdocumentosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Opcionesdocumentoses',
);

$this->menu=array(
	array('label'=>'Create Opcionesdocumentos', 'url'=>array('create')),
	array('label'=>'Manage Opcionesdocumentos', 'url'=>array('admin')),
);
?>

<h1>Opcionesdocumentoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
