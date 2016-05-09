<?php
/* @var $this ValorimpuestosController */
/* @var $model Valorimpuestos */

$this->breadcrumbs=array(
	'Valorimpuestoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Valorimpuestos', 'url'=>array('index')),
	array('label'=>'Create Valorimpuestos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#valorimpuestos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Impuestos</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'valorimpuestos-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		array('name'=>'activo','type'=>'raw','value'=>'CHtml::checkBox("hu",($data->activo=="1"),array("disabled"=>"disabled"))'),


		'hcodimpuesto',
		'impuesto.descripcion',
			'valor',
		'finicio',

		'ffinal',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
