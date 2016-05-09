<?php
/* @var $this CentrosController */
/* @var $model Centros */

$this->breadcrumbs=array(
	'Centroses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Centros', 'url'=>array('index')),
	array('label'=>'Ver Centros', 'url'=>array('admin')),
);
?>

<h1>Crear Centro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>