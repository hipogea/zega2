<?php


$this->menu=array(
	//array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Listado ', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Crear Registro Compra ', 'gear')   ?>

<?php $this->renderPartial('_form', array('model'=>$model,'proveedor'=>$proveedor)); ?>