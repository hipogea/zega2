<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */

$this->breadcrumbs=array(
	'Almacenmovimientoses'=>array('index'),
	$model->codmov=>array('view','id'=>$model->codmov),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear Transacción', 'url'=>array('create')),
	array('label'=>'Listado ', 'url'=>array('admin')),
);
?>

<h1>Actualizar Transacción<?php echo $model->codmov; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>