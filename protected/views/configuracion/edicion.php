<?php


$this->menu=array(
	array('label'=>'Listado', 'url'=>array('admin')),
	
);
?>

<?php MiFactoria::titulo('Editar Configuracion', 'gear');?>

<?php $this->renderPartial('_formeditar', array('model'=>$model)); ?>