<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	$model->idinventario=>array('view','id'=>$model->idinventario),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Crear activo', 'url'=>array('create')),
	array('label'=>'Visualizar activo', 'url'=>array('detalle', 'id'=>$model->idinventario)),
	array('label'=>'Ver activos', 'url'=>array('admin')),
	//array('label'=>'', 'url'=>array('admin')),
);
?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>