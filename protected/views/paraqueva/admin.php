<?php
/* @var $this ParaquevaController */
/* @var $model Paraqueva */

$this->breadcrumbs=array(
	'Paraquevas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('admin')),
	array('label'=>'Crear Destino', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paraqueva-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php MiFactoria::titulo('Destinos','package' ); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paraqueva-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cmotivo',
		'motivo',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
