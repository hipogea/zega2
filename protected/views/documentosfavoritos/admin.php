<?php
/* @var $this DocumentosfavoritosController */
/* @var $model Documentosfavoritos */

$this->breadcrumbs=array(
	'Documentosfavoritoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Documentosfavoritos', 'url'=>array('index')),
	array('label'=>'Create Documentosfavoritos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#documentosfavoritos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Mis favoritos</h1>

<div class="division">


<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentosfavoritos-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'documentosx.desdocu',
		'nombre',
		'texto',
		/*

		 *
		 *
		'column_7',
		'compartido',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>