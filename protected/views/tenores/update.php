<?php
/* @var $this TenoresController */
/* @var $model Tenores */

$this->breadcrumbs=array(
	'Tenores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),

	array('label'=>'Listado de Tenores', 'url'=>array('admin')),
);
?>

<h1>Actualizar tenor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>