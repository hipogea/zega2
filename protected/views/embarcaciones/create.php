<?php
/* @var $this EmbarcacionesController */
/* @var $model Embarcaciones */


$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Vehiculo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>