<?php
/* @var $this GrupoplanController */
/* @var $model Grupoplan */

$this->breadcrumbs=array(
	'Grupoplans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Grupoplan', 'url'=>array('index')),
	array('label'=>'Create Grupoplan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grupoplan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Grupoplans</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grupoplan-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codgrupo',
		'oficios.oficio',
		'interno',
		'codcen',
		'moneda.codmoneda',
		'tarifa',
            'escenario',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
