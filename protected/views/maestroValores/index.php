<?php
/* @var $this MaestroValoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Maestro Valores',
);

$this->menu=array(
	array('label'=>'Create MaestroValores', 'url'=>array('create')),
	array('label'=>'Manage MaestroValores', 'url'=>array('admin')),
);
?>

<h1>Maestro Valores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
