<?php
/* @var $this DesolpeController */
/* @var $model Desolpe */

$this->breadcrumbs=array(
	'Desolpes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Desolpe', 'url'=>array('index')),
	array('label'=>'Create Desolpe', 'url'=>array('create')),
	array('label'=>'Update Desolpe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Desolpe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Desolpe', 'url'=>array('admin')),
);
?>

<h1>View Desolpe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		'posicion',
		'tipimputacion',
		'centro',
		'codal',
		'codart',
		'txtmaterial',
		'grupocompras',
		'usuario',
		'modificado',
		'textodetalle',
		'fechacrea',
		'fechaent',
		'fechalib',
		'estadolib',
		'imputacion',
		'solicitanet',
		'hidsolpe',
		'creado',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'id',
		'codocu',
	),
)); ?>
