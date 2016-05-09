<?php
/* @var $this ChoferesController */
/* @var $model Choferes */

$this->breadcrumbs=array(
	'Choferes'=>array('index'),
	$model->brevete=>array('view','id'=>$model->brevete),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),

	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar Conductor <?php echo $model->brevete; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>