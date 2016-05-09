<?php
/* @var $this FacturController */
/* @var $model Factur */

$this->breadcrumbs=array(
	'Facturs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Factur', 'url'=>array('index')),
	array('label'=>'Create Factur', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#factur-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Facturs</h1>

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
	'id'=>'factur-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'numero',
		'codpro',
		'codproadqui',
		'fechaemision',
		'versionubl',
		'versionestruc',
		/*
		'fechaconsumo',
		'codestado',
		'texto',
		'textolargo',
		'tipodocumento',
		'moneda',
		'orcli',
		'descuento',
		'coddocu',
		'codtipofac',
		'codsociedad',
		'codgrupoventas',
		'ordenventa',
		'codcentro',
		'codobjeto',
		'fechapresentacion',
		'fechanominal',
		'fechacancelacion',
		'id',
		'tenorsup',
		'tenorinf',
		'numerocheque',
		'firmadigital',
		'tipodocadqui',
		'codleyenda',
		'codal',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
