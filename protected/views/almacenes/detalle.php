<?php

$this->menu=array(
	//array('label'=>'List Almacenes', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	//array('label'=>'View Almacenes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Visualizar Detalle   <?php echo $model->codalm." : ".$model->nomal; ?></h1>

<?php echo $this->renderPartial('detalle_general', array('model'=>$model)); ?>