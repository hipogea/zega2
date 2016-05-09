<?php
/* @var $this TenoresController */
/* @var $model Tenores */

$this->breadcrumbs=array(
	'Tenores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar tenor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Listado de Tenores', 'url'=>array('admin')),
);
?>

<h1>Ver tenor <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'coddocu',
		'mensaje',
		'posicion',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'creadopor',
		'activo',
		'logo',
		'id',
	),
)); ?>
