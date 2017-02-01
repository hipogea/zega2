<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */

$this->breadcrumbs=array(
	'Cmotivos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List CMotivo', 'url'=>array('index')),
	array('label'=>'Crear Motivo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cmotivo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Motivos de  transporte ','package') ?>


<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cmotivo-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codmotivo',
		'desmotivo',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
