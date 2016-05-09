<?php
/* @var $this CentrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Centroses',
);

$this->menu=array(
	array('label'=>'Crear Centros', 'url'=>array('create')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Centroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
