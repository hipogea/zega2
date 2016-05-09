<?php
/* @var $this CarterescambioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Carterescambios',
);

$this->menu=array(
	array('label'=>'Create Carterescambio', 'url'=>array('create')),
	array('label'=>'Manage Carterescambio', 'url'=>array('admin')),
);
?>

<h1>Carterescambios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
