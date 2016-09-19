<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */



$this->menu=array(
	//array('label'=>'List Masterequipo', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Masterequipo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar equipo<?php echo $model->codigo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modeloruta'=>$modeloruta)); ?>