<?php
/* @var $this PlantasController */
/* @var $model Plantas */


$this->menu=array(
	//array('label'=>'List Plantas', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Plantas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Ver planta - <?php echo $model->desplanta; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codplanta',
		'desplanta',
		//'id',
		'codigozona',
		'capacidad',
		'factor',
	),
)); ?>
