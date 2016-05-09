<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */

$this->breadcrumbs=array(
	'Valorimpuestoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Valorimpuestos', 'url'=>array('index')),
	array('label'=>'Create Valorimpuestos', 'url'=>array('create')),
	array('label'=>'View Valorimpuestos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Valorimpuestos', 'url'=>array('admin')),
);
?>

<h1>Update Valorimpuestos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>