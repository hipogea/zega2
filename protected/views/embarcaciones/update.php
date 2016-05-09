<?php
/* @var $this EmbarcacionesController */
/* @var $model Embarcaciones */


$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Crear nueva', 'url'=>array('create')),
	//array('label'=>'View Embarcaciones', 'url'=>array('view', 'id'=>$model->codep)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar Embaraci&ocaute;n <?php echo $model->nomep; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>