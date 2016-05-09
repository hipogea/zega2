<?php
/* @var $this CargamasivaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cargamasivas',
);

$this->menu=array(
	array('label'=>'Create Cargamasiva', 'url'=>array('create')),
	array('label'=>'Manage Cargamasiva', 'url'=>array('admin')),
);
?>

<h1>Cargamasivas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
