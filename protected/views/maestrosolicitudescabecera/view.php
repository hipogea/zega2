<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $model Maestrosolicitudescabecera */

$this->breadcrumbs=array(
	'Maestrosolicitudescabeceras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Maestrosolicitudescabecera', 'url'=>array('index')),
	array('label'=>'Create Maestrosolicitudescabecera', 'url'=>array('create')),
	array('label'=>'Update Maestrosolicitudescabecera', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Maestrosolicitudescabecera', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Maestrosolicitudescabecera', 'url'=>array('admin')),
);
?>

<h1>View Maestrosolicitudescabecera #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codcentro',
		'correlativo',
		'fecha',
		'creadopor',
		'modificadopor',
		'solicitante',
		'codigoestado',
		'coddocu',
		'descripcion',
	),
)); ?>
