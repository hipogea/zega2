<?php
/* @var $this MasterequipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Masterequipos',
);

$this->menu=array(
	array('label'=>'Create Masterequipo', 'url'=>array('create')),
	array('label'=>'Manage Masterequipo', 'url'=>array('admin')),
);
?>

<h1>Masterequipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
