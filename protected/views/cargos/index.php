<?php
/* @var $this CargosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cargoses',
);

$this->menu=array(
	array('label'=>'Create Cargos', 'url'=>array('create')),
	array('label'=>'Manage Cargos', 'url'=>array('admin')),
);
?>

<h1>Cargoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
