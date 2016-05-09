<?php
/* @var $this CarterescambioController */
/* @var $model Carterescambio */

$this->breadcrumbs=array(
	'Carterescambios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Carterescambio', 'url'=>array('index')),
	array('label'=>'Create Carterescambio', 'url'=>array('create')),
	array('label'=>'Update Carterescambio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Carterescambio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Carterescambio', 'url'=>array('admin')),
);
?>

<h1>View Carterescambio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idequipo',
		'capacidad',
		'tipoaceite',
		'horascambio',
		'tipocarter',
		'haceite',
		'hmuestra',
		'nummuestras',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'fulectura',
		'fumuestra',
		'fucambio',
		'horometro',
		'codigo',
		'activo',
		'hucambio',
		'casco',
		'id',
	),
)); ?>
