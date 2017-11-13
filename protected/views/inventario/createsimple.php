<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Ver activos', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form_simple', array('model'=>$model)); ?>