<?php
/* @var $this OpcionesbarraController */
/* @var $model Opcionesbarra */

$this->breadcrumbs=array(
	'Opcionesbarras'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Opcionesbarra', 'url'=>array('index')),
	array('label'=>'Create Opcionesbarra', 'url'=>array('create')),
);

?>

<h1>Opciones del  Toolbar</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'opcionesbarra-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'idope','value'=>'$data->botones->nameop'),
		array('name'=>'codocu','value'=>'$data->documentos->desdocu'),
		'codocu',
		'codestado',
		array('name'=>'codestado','value'=>'$data->estado->estado'),
		'action',
		'activo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
