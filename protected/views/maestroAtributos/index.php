<?php
/* @var $this MaestroAtributosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestro Atributoses',
);

$this->menu=array(
	array('label'=>'Create MaestroAtributos', 'url'=>array('create')),
	array('label'=>'Manage MaestroAtributos', 'url'=>array('admin')),
);
?>

<h1>Maestro Atributoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
