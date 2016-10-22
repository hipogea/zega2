<?php
/* @var $this TenenciasController */
/* @var $model Tenencias */



$this->menu=array(
	//array('label'=>'List Tenencias', 'url'=>array('index')),
	array('label'=>'Crear Tenencias', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tenencias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Listado de tenencias', 'inbox');   ?>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tenencias-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codte',
		'deste',
		'codcen',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
