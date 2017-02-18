<?php
/* @var $this ComprobantesController */
/* @var $model Comprobantes */

$this->breadcrumbs=array(
	'Comprobantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comprobantes', 'url'=>array('index')),
	array('label'=>'Create Comprobantes', 'url'=>array('create')),
	array('label'=>'View Comprobantes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Comprobantes', 'url'=>array('admin')),
);
?>

<h1>Update Comprobantes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>