<?php
/* @var $this UsuariosfavoritosController */
/* @var $model Usuariosfavoritos */

$this->breadcrumbs=array(
	'Usuariosfavoritoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usuariosfavoritos', 'url'=>array('index')),
	array('label'=>'Manage Usuariosfavoritos', 'url'=>array('admin')),
);
?>

<h1>Create Usuariosfavoritos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>