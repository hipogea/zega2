<?php
/* @var $this SociedadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sociedades',
);

$this->menu=array(
	array('label'=>'Crear Sociedad', 'url'=>array('create')),
	array('label'=>'Sociedades', 'url'=>array('admin')),
);
?>

<h1>Sociedades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
