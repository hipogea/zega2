<?php
/* @var $this IgvController */
/* @var $model Igv */

$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Igv', 'url'=>array('index')),
	array('label'=>'Create Igv', 'url'=>array('create')),
	array('label'=>'View Igv', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Igv', 'url'=>array('admin')),
);
?>

<h1>Update Igv <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>