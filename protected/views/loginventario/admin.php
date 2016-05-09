<?php
/* @var $this LoginventarioController */
/* @var $model Loginventario */

$this->breadcrumbs=array(
	'Loginventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Loginventario', 'url'=>array('index')),
	array('label'=>'Create Loginventario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('loginventario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Loginventarios</h1>

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
	'id'=>'loginventario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idlog',
		'hidinventario',
		'c_estado',
		'codep',
		'comentario',
		'guias.c_numgui',
		'fecha',
		/*
		'coddocu',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codlugar',
		'codigopadre',
		'numerodocumento',
		'adicional',
		'codestado',
		'codepanterior',
		'codlugarant',
		'iddocu',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
