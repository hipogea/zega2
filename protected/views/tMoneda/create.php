<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	'Create',
);

$this->menu=array(
	
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Crear Moneda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>