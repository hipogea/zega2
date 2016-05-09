<?php
/* @var $this IgvController */
/* @var $model Igv */

$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	array('label'=>'Crear impuesto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#igv-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'igv-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'valor',			
		'tipo',
		'Descripcion',
        'activo',
        'finicio',
        'ffin',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
