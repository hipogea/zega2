<?php
/* @var $this UsuariosfavoritosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuariosfavoritoses',
);

$this->menu=array(
	array('label'=>'Create Usuariosfavoritos', 'url'=>array('create')),
	array('label'=>'Manage Usuariosfavoritos', 'url'=>array('admin')),
);
?>

<h1>Usuariosfavoritoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
