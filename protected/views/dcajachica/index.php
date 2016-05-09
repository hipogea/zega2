<?php
/* @var $this DcajachicaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dcajachicas',
);

$this->menu=array(
	array('label'=>'Create Dcajachica', 'url'=>array('create')),
	array('label'=>'Manage Dcajachica', 'url'=>array('admin')),
);
?>

<h1>Dcajachicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
