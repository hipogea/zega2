<?php
/* @var $this DocumentosController */
/* @var $model Documentos */

$this->breadcrumbs=array(
	'Documentoses'=>array('index'),
	$model->coddocu,
);

$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	array('label'=>'Crear Documento', 'url'=>array('create')),
	array('label'=>'Editar Documento', 'url'=>array('update', 'id'=>$model->coddocu)),
	//array('label'=>'Delete Documentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->coddocu),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Documentos', 'url'=>array('admin')),
);
?>

<h1>Documento <?php echo $model->coddocu; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'coddocu',
		'desdocu',
		'clase',
		'tipo',		
		'abreviatura',
	),
)); ?>
