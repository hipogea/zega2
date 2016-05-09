<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	$model->idguia,
);

$this->menu=array(
	//array('label'=>'List Coti', 'url'=>array('index')),
	array('label'=>'Crear Oc', 'url'=>array('CreaDocumento')),
	array('label'=>'Actualizar Oc', 'url'=>array('EditaDocumento', 'id'=>$model->idguia)),
	//array('label'=>'Delete Coti', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idguia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado Oc', 'url'=>array('admin')),
);
?>

<h1>View Coti #<?php echo $model->idguia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numcot',
		'codpro',
		'fecdoc',
		'codcon',
		'codestado',
		'texto',
		'textolargo',
		'tipologia',
		'moneda',
		'orcli',
		'descuento',
		'usuario',
		'coddocu',
		'creado',
		'modificado',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codtipofac',
		'codsociedad',
		'codgrupoventas',
		'codtipocotizacion',
		'validez',
		'codcentro',
		'nigv',
		'codobjeto',
		'fechapresentacion',
		'fechanominal',
		'idguia',
		'tenorsup',
		'tenorinf',
		'montototal',
	),
)); ?>
