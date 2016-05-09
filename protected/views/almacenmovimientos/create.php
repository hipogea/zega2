<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */

$this->breadcrumbs=array(
	'Almacenmovimientoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Almacenmovimientos', 'url'=>array('index')),
	array('label'=>'Manage Almacenmovimientos', 'url'=>array('admin')),
);
?>

<h1>Crear Transacción</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>