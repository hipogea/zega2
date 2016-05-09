<?php
/* @var $this ClasesmaestroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clasesmaestros',
);

$this->menu=array(
	array('label'=>'Create Clasesmaestro', 'url'=>array('create')),
	array('label'=>'Manage Clasesmaestro', 'url'=>array('admin')),
);
?>

<h1>Clasesmaestros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
