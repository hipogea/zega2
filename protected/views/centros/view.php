<?php
/* @var $this CentrosController */
/* @var $model Centros */

$this->breadcrumbs=array(
	'Centroses'=>array('index'),
	$model->codcen,
);

$this->menu=array(

	array('label'=>'Crear Centro', 'url'=>array('create')),
	array('label'=>'Actualizar Centro', 'url'=>array('update', 'id'=>$model->codcen)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Centros #<?php echo $model->codcen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codcen',
		'codsoc',
		'nomcen',
		'descricen',

	),
)); ?>
