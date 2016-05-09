<?php
/* @var $this TrabajadoresController */
/* @var $model Trabajadores */

$this->breadcrumbs=array(
	'Trabajadores'=>array('index'),
	$model->codigotra=>array('view','id'=>$model->codigotra),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Trabajadores', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->codigotra)),
	array('label'=>'Visualizar', 'url'=>array('admin')),
);
?>

<h1>Actualizar  :  <?php echo $model->ap."-".$model->am."-".$model->nombres; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>