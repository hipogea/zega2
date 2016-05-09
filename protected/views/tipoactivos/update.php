<?php
/* @var $this TipoactivosController */
/* @var $model Tipoactivos */

$this->breadcrumbs=array(
	'Tipoactivoses'=>array('index'),
	$model->codtipo=>array('view','id'=>$model->codtipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipoactivos', 'url'=>array('index')),
	array('label'=>'Create Tipoactivos', 'url'=>array('create')),
	array('label'=>'View Tipoactivos', 'url'=>array('view', 'id'=>$model->codtipo)),
	array('label'=>'Manage Tipoactivos', 'url'=>array('admin')),
);
?>

<h1>Update Tipoactivos <?php echo $model->codtipo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>