<?php
/* @var $this ObjetosClienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Objetos Clientes',
);

$this->menu=array(
	array('label'=>'Create ObjetosCliente', 'url'=>array('create')),
	array('label'=>'Manage ObjetosCliente', 'url'=>array('admin')),
);
?>

<h1>Objetos Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
