<?php
/* @var $this TipofacturacionController */
/* @var $model Tipofacturacion */

$this->breadcrumbs=array(
	'Tipofacturacions'=>array('index'),
	$model->codtipofac=>array('view','id'=>$model->codtipofac),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Tipofacturacion', 'url'=>array('index')),
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
	//array('label'=>'View Tipofacturacion', 'url'=>array('view', 'id'=>$model->codtipofac)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar Modalidad <?php echo $model->codtipofac; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>