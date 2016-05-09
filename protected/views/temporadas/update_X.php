<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */

$this->breadcrumbs=array(
	'Temporadases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Temporadas', 'url'=>array('index')),
	array('label'=>'Create Temporadas', 'url'=>array('create')),
	array('label'=>'View Temporadas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Temporadas', 'url'=>array('admin')),
);
?>

<h1>Update Temporadas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>