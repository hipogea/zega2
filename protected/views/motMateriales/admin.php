<?php
/* @var $this MotMaterialesController */
/* @var $model MotMateriales */
//curdb  = explode('=', Yii::app()->db->connectionString);
//echo $curdb[2];
//echo Mot::numero();

$this->breadcrumbs=array(
	'Mot Materiales'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MotMateriales', 'url'=>array('index')),
	array('label'=>'Create MotMateriales', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('mot-materiales-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Mot Materiales</h1>

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
	'id'=>'mot-materiales-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	     'barcos.nomep',
		 'trabajador.ap',
		'fecha',
		'id',
		'descripcion',
		'numero',
		'codcentro',
		'codplanta',
		/*
		'codtraba',
		'creadoel',
		'creadopor',
		'modificadoel',
		'modificadopor',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
