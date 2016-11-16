<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */

$this->breadcrumbs=array(
	'Docingresadoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Create Docingresados', 'url'=>array('create')),
	array('label'=>'View Docingresados', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Docingresados', 'url'=>array('admin')),
);
?>

 <?php MiFactoria::titulo('Actualizar ingreso', 'gear') ; ?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'esfinal'=>$esfinal)); ?>