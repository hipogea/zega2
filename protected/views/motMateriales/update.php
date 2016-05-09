<?php
/* @var $this MotMaterialesController */
/* @var $model MotMateriales */

$this->breadcrumbs=array(
	'Mot Materiales'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MotMateriales', 'url'=>array('index')),
	array('label'=>'Create MotMateriales', 'url'=>array('create')),
	array('label'=>'View MotMateriales', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MotMateriales', 'url'=>array('admin')),
);
?>

<h1>Update MotMateriales <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>