<?php
/* @var $this AuthobjetosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Authobjetoses',
);

$this->menu=array(
	array('label'=>'Create Authobjetos', 'url'=>array('create')),
	array('label'=>'Manage Authobjetos', 'url'=>array('admin')),
);
?>

<h1>Authobjetoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
