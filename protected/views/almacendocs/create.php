<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */

$this->breadcrumbs=array(
	'Almacendocs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Almacendocs', 'url'=>array('index')),
	array('label'=>'Movimientos', 'url'=>array('alkardex/admin')),
);
?>

<h1>Nuevo documento de Almacen</h1>

<?php echo $this->renderPartial('n_form', array('model'=>$model)); ?>