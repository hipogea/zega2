<?php
/* @var $this GrupoventasController */
/* @var $model Grupoventas */

$this->breadcrumbs=array(
	'Grupoventases'=>array('index'),
	$model->codgrupo=>array('view','id'=>$model->codgrupo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Grupoventas', 'url'=>array('index')),
	array('label'=>'Create Grupoventas', 'url'=>array('create')),
	array('label'=>'View Grupoventas', 'url'=>array('view', 'id'=>$model->codgrupo)),
	array('label'=>'Manage Grupoventas', 'url'=>array('admin')),
);
?>

<h1>Update Grupoventas <?php echo $model->codgrupo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>