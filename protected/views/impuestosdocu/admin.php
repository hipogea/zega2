<?php
/* @var $this ImpuestosdocuController */
/* @var $model Impuestosdocu */

$this->breadcrumbs=array(
	'Impuestosdocus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Impuestosdocu', 'url'=>array('index')),
	array('label'=>'Create Impuestosdocu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#impuestosdocu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Asignar impuestos a los documentos</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'impuestosdocu-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'documentos.desdocu',
		'impuestos.descripcion',

		'codocu',
		'codimpuesto',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
