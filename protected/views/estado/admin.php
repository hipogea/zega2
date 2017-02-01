



<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Estado', 'url'=>array('index')),
	array('label'=>'Create Estado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> Estados</h1>



<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'columns'=>array(
		'codestado',
             array('name'=>'codocu','header'=>'Documento','value'=>'$data->dokis->desdocu','filter'=>CHTml::listData(Documentos::model()->findAll(),'coddocu','desdocu'), 'htmlOptions'=>array('width'=>400),),
		
		//'dokis.desdocu',
		//'codocu',
		'estado',
		'ordenn',

		/*
		'modificadopor',
		'modificadoel',
		'eseditable',
		'esanulable',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

