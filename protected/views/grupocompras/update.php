<?php
/* @var $this GrupocomprasController */
/* @var $model Grupocompras */

$this->breadcrumbs=array(
	'Grupocomprases'=>array('index'),
	$model->codgrupo=>array('view','id'=>$model->codgrupo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Grupocompras', 'url'=>array('index')),
	array('label'=>'Create Grupocompras', 'url'=>array('create')),
	array('label'=>'View Grupocompras', 'url'=>array('view', 'id'=>$model->codgrupo)),
	array('label'=>'Manage Grupocompras', 'url'=>array('admin')),
);
?>

<h1>Update Grupocompras <?php echo $model->codgrupo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>