<?php
/* @var $this PartesController */
/* @var $model Partes */

$this->breadcrumbs=array(
	'Partes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar partes', 'url'=>array('index')),
	array('label'=>'Administrar partes', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array(
			'model'=>$model,'modelonovedades'=>$modelonovedades,'proveedornovedades'=>$proveedornovedades,'ptipo'=>$ptipo,'codep'=>$codep,
		)); ?>