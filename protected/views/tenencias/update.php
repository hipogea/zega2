<?php
/* @var $this TenenciasController */
/* @var $model Tenencias */



$this->menu=array(
	
	array('label'=>'Crear', 'url'=>array('create')),
	
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar tenencia', 'Node') ?>

<?php $this->renderPartial('_formulario', array('model'=>$model)); ?>