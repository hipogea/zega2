<?php
/* @var $this CuentasController */
/* @var $model Cuentas */


$this->menu=array(
	//array('label'=>'List Cuentas', 'url'=>array('index')),
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
	//array('label'=>'View Cuentas', 'url'=>array('view', 'id'=>$model->codcuenta)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Actualizar Registro de compra ', 'gear')   ?>


<?php $this->renderPartial('_form', array('model'=>$model,'proveedor'=>$proveedor)); ?>