<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Coti', 'url'=>array('index')),
	array('label'=>'Create Coti', 'url'=>array('create')),
);


?>




<?PHP
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('coti-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cotis</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 

$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		'codcentro',
		'numcot',
		'codpro',
		'despro',
		'fecdoc',
		'cant',
		 'um',
		 'codart',
		 'punit',
		 'descri',
		 'estadodet',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
