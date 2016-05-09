<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */



$this->menu=array(
	//array('label'=>'List Masterequipo', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>''.$model->id),
	//array('label'=>'Delete Masterequipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Visualizar Equipo    <?php echo $model->codigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo',
		'descripcion',
		'marca',
		'modelo',
		'numeroparte',
		'codart',
		'id',
	),
)); ?>
