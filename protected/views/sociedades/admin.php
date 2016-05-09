<?php
/* @var $this SociedadesController */
/* @var $model Sociedades */

$this->breadcrumbs=array(
	'Sociedades'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Sociedades', 'url'=>array('index')),
	array('label'=>'Crear Sociedad', 'url'=>array('create')),
);

?>

<h1>Sociedades</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sociedades-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'socio',
	   'dsocio',
		'rucsoc',
		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
