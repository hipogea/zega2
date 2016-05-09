<?php
/* @var $this ContactosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contactoses',
);

$this->menu=array(
	//array('label'=>'Create Contactos', 'url'=>array('create')),
	array('label'=>'Contactos', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
