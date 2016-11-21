<?php
/* @var $this MasterequipoController */
/* @var $model Masterequipo */

$this->breadcrumbs=array(
	'Masterequipos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Masterequipo', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#masterequipo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Master de equipos</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'masterequipo-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
  
	//'filter'=>$model,
	'columns'=>array(
		'codigo',
		'descripcion',
		'marca',
		'modelo',
		'numeroparte',
		'codart',
		/*
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
			
		),
	),
)); ?>
