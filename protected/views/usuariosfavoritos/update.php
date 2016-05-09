<?php
/* @var $this UsuariosfavoritosController */
/* @var $model Usuariosfavoritos */

$this->breadcrumbs=array(
	'Usuariosfavoritoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuariosfavoritos', 'url'=>array('index')),
	array('label'=>'Create Usuariosfavoritos', 'url'=>array('create')),
	array('label'=>'View Usuariosfavoritos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usuariosfavoritos', 'url'=>array('admin')),
);
?>

<h1>Update Usuariosfavoritos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>