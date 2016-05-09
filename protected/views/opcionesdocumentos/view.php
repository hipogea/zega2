<?php
/* @var $this OpcionesdocumentosController */
/* @var $model Opcionesdocumentos */

$this->breadcrumbs=array(
	'Opcionesdocumentoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Opcionesdocumentos', 'url'=>array('index')),
	array('label'=>'Create Opcionesdocumentos', 'url'=>array('create')),
	array('label'=>'Update Opcionesdocumentos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Opcionesdocumentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opcionesdocumentos', 'url'=>array('admin')),
);
?>

<h1>View Opcionesdocumentos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usuario',
		'codparam',
		'valor',
		'tipodato',
		'seleccionador',
		'codocu',
		'idusuario',
		'nombrecampo',
		'nombretabla',
		'idopdoc',
	),
)); ?>
