<?php
/* @var $this InventariofisicopadreController */
/* @var $model Inventariofisicopadre */

$this->breadcrumbs=array(
	'Inventariofisicopadres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Inventariofisicopadre', 'url'=>array('index')),
	array('label'=>'Create Inventariofisicopadre', 'url'=>array('create')),
	array('label'=>'View Inventariofisicopadre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Inventariofisicopadre', 'url'=>array('admin')),
);
?>

<h1>Update Inventariofisicopadre <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('modelhijo'=>$modelhijo,'model'=>$model)); ?>