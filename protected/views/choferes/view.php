<?php
/* @var $this ChoferesController */
/* @var $model Choferes */

$this->breadcrumbs=array(
	'Choferes'=>array('index'),
	$model->brevete,
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->brevete)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Ver Conductor  <?php echo $model->brevete; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'brevete',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
	),
)); ?>
