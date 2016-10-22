<?php


$this->menu=array(
	
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Crear tenencia', 'Node') ?>

<?php $this->renderPartial('_formulario', array('model'=>$model)); ?>