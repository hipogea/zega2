<?php
/* @var $this CoordreporteController */
/* @var $model Coordreporte */

$this->breadcrumbs=array(
	'Coordreportes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coordreporte', 'url'=>array('index')),
	array('label'=>'Create Coordreporte', 'url'=>array('create')),
	array('label'=>'View Coordreporte', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coordreporte', 'url'=>array('admin')),
);
?>

<h1>Update Coordreporte <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>