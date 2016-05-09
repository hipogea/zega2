<?php
/* @var $this ImpuestosController */
/* @var $model Impuestos */

$this->breadcrumbs=array(
	'Impuestoses'=>array('index'),
	$model->codimpuesto=>array('view','id'=>$model->codimpuesto),
	'Update',
);

$this->menu=array(
	array('label'=>'List Impuestos', 'url'=>array('index')),
	array('label'=>'Create Impuestos', 'url'=>array('create')),
	array('label'=>'View Impuestos', 'url'=>array('view', 'id'=>$model->codimpuesto)),
	array('label'=>'Manage Impuestos', 'url'=>array('admin')),
);
?>

<h1>Update Impuestos <?php echo $model->codimpuesto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>