<?php
/* @var $this DocumentosController */
/* @var $model Documentos */

$this->breadcrumbs=array(
	'Documentoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	array('label'=>'Crear Documento', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('documentos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Busqueda','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentos-grid',
	'dataProvider'=>$model->search(),
      'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'filter'=>$model,
	'columns'=>array(
		'coddocu',
		
		'desdocu',
		'clase',
		'tipo',
		'creadopor',
		'creadoel',
		'prefijo',
		/*
		'modificadopor',
		'modificadoel',
		'coddocupadre',
		'tabla',
		'anuladesde',
		'cactivo',
		'abreviatura',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
