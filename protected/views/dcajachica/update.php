<?php
/* @var $this DcajachicaController */
/* @var $model Dcajachica */

$this->breadcrumbs=array(
	'Dcajachicas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dcajachica', 'url'=>array('index')),
	array('label'=>'Create Dcajachica', 'url'=>array('create')),
	array('label'=>'View Dcajachica', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Dcajachica', 'url'=>array('admin')),
);
?>

<h1>Update Dcajachica <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>