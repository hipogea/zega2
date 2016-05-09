<?php
/* @var $this ClasesmaestroController */
/* @var $model Clasesmaestro */

$this->breadcrumbs=array(
	'Clasesmaestros'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Clasesmaestro', 'url'=>array('index')),
	array('label'=>'Create Clasesmaestro', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clasesmaestro-grid').yiiGridView('update', {
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
	'id'=>'clasesmaestro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codclasema',
		'nomclase',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
