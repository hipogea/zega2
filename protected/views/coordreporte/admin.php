<?php
/* @var $this CoordreporteController */
/* @var $model Coordreporte */

$this->breadcrumbs=array(
	'Coordreportes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Coordreporte', 'url'=>array('index')),
	array('label'=>'Create Coordreporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#coordreporte-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Coordreportes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coordreporte-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'visiblecampo',
		'codocu',
		'left_',
		'top',
		'font_size',
		'font_family',
		'nombre_campo',
		/*
		'font_weight',
		'font_color',
		'nombre_campo',
		'lbl_left',
		'lbl_top',
		'lbl_font_size',
		'lbl_font_weight',
		'lbl_font_family',
		'lbl_font_color',
		'visiblelabel',
		'visiblecampo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
