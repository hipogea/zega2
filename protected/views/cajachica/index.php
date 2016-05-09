<?php
/* @var $this CajachicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cajachicas',
);

$this->menu=array(
	array('label'=>'Create Cajachica', 'url'=>array('create')),
	array('label'=>'Manage Cajachica', 'url'=>array('admin')),
);
?>

<h1>Cajachicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
