<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */

$this->breadcrumbs=array(
	'Tmonedas'=>array('index'),
	$model->codmoneda=>array('view','id'=>$model->codmoneda),
	'Update',
);

$this->menu=array(

	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Ver moneda', 'url'=>array('view', 'id'=>$model->codmoneda)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Actualizar Moneda <?php echo $model->codmoneda; ?></h1>

<?php echo $this->renderPartial('_editar', array('model'=>$model)); ?>