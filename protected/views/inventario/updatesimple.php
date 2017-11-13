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
	array('label'=>'Crear Equipo', 'url'=>array('create')),
	array('label'=>'Visualizar Equipo', 'url'=>array('detalle', 'id'=>$model->idinventario)),
	array('label'=>'Ver Equipos', 'url'=>array('admin')),
	//array('label'=>'Hacer una observacion', 'url'=>array('vaa','idinventario'=>$model->idinventario)),
	//array('label'=>'Administrar este activo', 'url'=>array('updatetotal', 'id'=>$model->idinventario)),
);
?>

<h1><?php  echo yii::t('app','Actualizar equipo');   ?></h1>

<?php echo $this->renderPartial('_form_simple', array('model'=>$model)); ?>