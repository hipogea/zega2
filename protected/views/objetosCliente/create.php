<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */

$this->breadcrumbs=array(
	'Objetos Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ObjetosCliente', 'url'=>array('index')),
	array('label'=>'Listado de objetos', 'url'=>array('admin')),
);
?>

<h1>Create ObjetosCliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>