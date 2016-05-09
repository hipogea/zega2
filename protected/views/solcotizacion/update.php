<?php
/* @var $this SolcotizacionController */
/* @var $model Solcotizacion */

$this->breadcrumbs=array(
	'Solcotizacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Solcotizacion', 'url'=>array('index')),
	array('label'=>'Create Solcotizacion', 'url'=>array('create')),
	array('label'=>'View Solcotizacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Solcotizacion', 'url'=>array('admin')),
);
?>

<h1>Update Solcotizacion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>