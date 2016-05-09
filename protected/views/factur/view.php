<?php
/* @var $this FacturController */
/* @var $model Factur */

$this->breadcrumbs=array(
	'Facturs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Factur', 'url'=>array('index')),
	array('label'=>'Create Factur', 'url'=>array('create')),
	array('label'=>'Update Factur', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Factur', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Factur', 'url'=>array('admin')),
);
?>

<h1>View Factur #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		'codpro',
		'codproadqui',
		'fechaemision',
		'versionubl',
		'versionestruc',
		'fechaconsumo',
		'codestado',
		'texto',
		'textolargo',
		'tipodocumento',
		'moneda',
		'orcli',
		'descuento',
		'coddocu',
		'codtipofac',
		'codsociedad',
		'codgrupoventas',
		'ordenventa',
		'codcentro',
		'codobjeto',
		'fechapresentacion',
		'fechanominal',
		'fechacancelacion',
		'id',
		'tenorsup',
		'tenorinf',
		'numerocheque',
		'firmadigital',
		'tipodocadqui',
		'codleyenda',
		'codal',
	),
)); ?>
