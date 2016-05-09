<?php
/* @var $this GrupoventasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupoventases',
);

$this->menu=array(
	array('label'=>'Create Grupoventas', 'url'=>array('create')),
	array('label'=>'Manage Grupoventas', 'url'=>array('admin')),
);
?>

<h1>Grupoventases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
