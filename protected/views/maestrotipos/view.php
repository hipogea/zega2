<?php
/* @var $this MaestrotiposController */
/* @var $model Maestrotipos */

$this->breadcrumbs=array(
	'Maestrotiposes'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>View Maestrotipos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codtipo',
		'destipo',
	),
)); ?>
