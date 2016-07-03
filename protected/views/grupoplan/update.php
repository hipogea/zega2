<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */

$this->breadcrumbs=array(
	'Grupoplans'=>array('index'),
	$model->codgrupo=>array('view','id'=>$model->codgrupo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Grupoplan', 'url'=>array('index')),
	array('label'=>'Create Grupoplan', 'url'=>array('create')),
	array('label'=>'View Grupoplan', 'url'=>array('view', 'id'=>$model->codgrupo)),
	array('label'=>'Manage Grupoplan', 'url'=>array('admin')),
);
?>

<h1>Update Grupoplan <?php echo $model->codgrupo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>