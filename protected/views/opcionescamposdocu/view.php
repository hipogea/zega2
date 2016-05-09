<?php
/* @var $this OpcionescamposdocuController */
/* @var $model Opcionescamposdocu */

$this->breadcrumbs=array(
	'Opcionescamposdocus'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Opcionescamposdocu', 'url'=>array('index')),
	array('label'=>'Create Opcionescamposdocu', 'url'=>array('create')),
	array('label'=>'Update Opcionescamposdocu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Opcionescamposdocu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Opcionescamposdocu', 'url'=>array('admin')),
);
?>

<h1>View Opcionescamposdocu #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codocu',
		'campo',
		'nombrecampo',
		'tipodato',
		'longitud',
		'nombredelmodelo',
		'primercampolista',
		'segundocampolista',
		'seleccionable',
	),
)); ?>
