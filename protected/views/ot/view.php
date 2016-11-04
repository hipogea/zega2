<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Nueva orden', 'url'=>array('creadocumento')),
	array('label'=>'Modificar','url'=>array('editadocumento','id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Ot #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'numero',
		'fechacre',
		'fechafinprog',
		'codpro',
		'idobjeto',
		'codresponsable',
		'textocorto',
		'textolargo',
		'grupoplan',
		'codcen',
		'iduser',
		'codocu',
		'codestado',
		'clase',
		'hidoferta',
	),
)); ?>
