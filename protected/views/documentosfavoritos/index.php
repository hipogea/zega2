<?php
/* @var $this DocumentosfavoritosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documentosfavoritoses',
);

$this->menu=array(
	array('label'=>'Create Documentosfavoritos', 'url'=>array('create')),
	array('label'=>'Manage Documentosfavoritos', 'url'=>array('admin')),
);
?>

<h1>Documentosfavoritoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
