<?php
/* @var $this EmbarcacionesController */
/* @var $model Embarcaciones */


$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->codep)),
	//array('label'=>'Delete Embarcaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nomep; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codep',
		'nomep',
		'matricula',
		'cbodega',
		'activa',
		//'codsap',
		//'creadopor',
		//'creadoel',
		//'modificadopor',
		//'modificadoel',
		//'codcentro',
	),
)); ?>
