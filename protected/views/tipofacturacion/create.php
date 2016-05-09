<?php
/* @var $this TipofacturacionController */
/* @var $model Tipofacturacion */



$this->menu=array(
	//array('label'=>'List Tipofacturacion', 'url'=>array('index')),
	array('label'=>'Modalidades', 'url'=>array('admin')),
);
?>

<h1>Crear Modalidad de Pago</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>