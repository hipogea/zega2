<?php
/* @var $this FondofijoController */
/* @var $model Fondofijo */

$this->breadcrumbs=array(
	'Fondofijos'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#fondofijo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php  MiFactoria::titulo('Fondo fijo','package') ?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'fondofijo-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',
		'desfondo',
		'codtra',
		'codcen',
		'iduser',
		'fondo',
		/*
		'codmon',
		'numerodias',
		'gastomax',
		'rojo',
		'naranja',
		'azul',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}'
		),
	),
)); ?>
