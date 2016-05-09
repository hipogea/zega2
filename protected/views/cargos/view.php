<?php
/* @var $this CargosController */
/* @var $model Cargos */

$this->breadcrumbs=array(
	'Cargoses'=>array('index'),
	$model->cnumcargo,
);

$this->menu=array(
	array('label'=>'List Cargos', 'url'=>array('index')),
	array('label'=>'Create Cargos', 'url'=>array('create')),
	array('label'=>'Update Cargos', 'url'=>array('update', 'id'=>$model->cnumcargo)),
	array('label'=>'Delete Cargos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cnumcargo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cargos', 'url'=>array('admin')),
);
?>

<h1>View Cargos #<?php echo $model->cnumcargo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigocentro',
		'descargo',
		'm_cargo',
		'codjefe',
		'codentrega',
		'codrecibe',
		'fecdocumento',
		'fecentrega',
		'codtipocargo',
		'codigoestadocargo',
		'cnumcargo',
		'coddocucargo',
		'creadopor',
		'creadoel',
		'modificadoel',
		'modificadopor',
		'idcargo',
		'avisarvencimiento',
		'fechavencimiento',
		'esalmacen',
	),
)); ?>
