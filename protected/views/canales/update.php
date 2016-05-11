<?php
/* @var $this CanalesController */
/* @var $model Canales */

$this->breadcrumbs=array(
	'Canales'=>array('index'),
	$model->codcanal=>array('view','id'=>$model->codcanal),
	'Update',
);

$this->menu=array(
	array('label'=>'List Canales', 'url'=>array('index')),
	array('label'=>'Create Canales', 'url'=>array('create')),
	array('label'=>'View Canales', 'url'=>array('view', 'id'=>$model->codcanal)),
	array('label'=>'Manage Canales', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar canal de transporte','camion');?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>