<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */

$this->breadcrumbs=array(
	'Sociedades'=>array('index'),
	$model->socio,
);

$this->menu=array(

	array('label'=>'Crear Sociedad', 'url'=>array('create')),
	array('label'=>'Modificar Sociedad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Listado Sociedad', 'url'=>array('admin')),
);
?>

<h1>Ver sociedade  <?php echo $model->socio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'socio',
		'dsocio',
		'rucsoc',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'estado',
	),
)); ?>
