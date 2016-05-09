<?php
/* @var $this PartesController */
/* @var $model Partes */

$this->breadcrumbs=array(
	'Partes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


?>



<?php  
echo $this->renderPartial('_form', array('model'=>$model,'modelonovedades'=>$modelonovedades,'proveedornovedades'=>$proveedornovedades,'ptipo'=>$ptipo,'codep'=>$codep)); ?>