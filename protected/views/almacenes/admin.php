<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */

$this->breadcrumbs=array(
	'Almacenes'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear Almacen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#almacenes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> Almacenes</h1>

 


<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacenes-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codalm',
		'nomal',
		'desalm',
		'codmon',
		'tipo',
		'codcen',
		'creadopor',

		/*
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codsoc',
		'tipovaloracion',
		'estructura',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
