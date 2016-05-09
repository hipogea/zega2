<?php
/* @var $this SeleccionableController */
/* @var $model Seleccionable */

$this->breadcrumbs=array(
	'Seleccionables'=>array('index'),
	$model->codsel=>array('view','id'=>$model->codsel),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seleccionable', 'url'=>array('index')),
	array('label'=>'Create Seleccionable', 'url'=>array('create')),
	array('label'=>'View Seleccionable', 'url'=>array('view', 'id'=>$model->codsel)),
	array('label'=>'Manage Seleccionable', 'url'=>array('admin')),
);
?>

<h1>Update Seleccionable <?php echo $model->codsel; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>