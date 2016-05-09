<?php
/* @var $this SolpeController */
/* @var $model Solpe */

$this->breadcrumbs=array(
	'Solpes'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Editar solicitud', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Solpe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<h1>Solicitud de material -  <?php echo $model->numero.' '.($model->estado=='01')?'  Creada':''; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'numero',
		'tipo',
		'textocabecera',
		'creado',
		'autor',
		'estado',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'fechadoc',
		'fechanec',
		'id',
	),
)); ?>

<?php 
		$this->renderPartial('vw_detalle_grilla', array('model'=>$model,'idcabecera'=>$model->id,'eseditable'=>'disabled'));

 ?>