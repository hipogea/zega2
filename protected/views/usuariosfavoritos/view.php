<?php
/* @var $this UsuariosfavoritosController */
/* @var $model Usuariosfavoritos */

$this->breadcrumbs=array(
	'Usuariosfavoritoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usuariosfavoritos', 'url'=>array('index')),
	array('label'=>'Create Usuariosfavoritos', 'url'=>array('create')),
	array('label'=>'Update Usuariosfavoritos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Usuariosfavoritos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuariosfavoritos', 'url'=>array('admin')),
);
?>

<h1>View Usuariosfavoritos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hiduser',
		'url',
		'fecharegistro',
		'valido',
		'chapa',
	),
)); ?>
