<?php
/* @var $this PeriodosController */
/* @var $model Periodos */

$this->breadcrumbs=array(
	'Periodoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Periodos', 'url'=>array('index')),
	array('label'=>'Create Periodos', 'url'=>array('create')),
	array('label'=>'View Periodos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Periodos', 'url'=>array('admin')),
);
?>

<h1>Update Periodos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>