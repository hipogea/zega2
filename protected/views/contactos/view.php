<?php
/* @var $this ContactosController */
/* @var $model Contactos */

$this->breadcrumbs=array(
	'Contactoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Contactos', 'url'=>array('index')),
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Actualizar Contacto', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Contactos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Contactos', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->c_nombre; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_hcod',
		'c_nombre',
		'c_cargo',
		'c_tel',
		'c_mail',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'correlativo',
		'fecnacimiento',
		'calificacion',
		'id',
	),
)); ?>
