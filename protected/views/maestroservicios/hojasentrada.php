<?php
/* @var $this MaestroserviciosController */
/* @var $model Maestroservicios */

$this->breadcrumbs=array(
	'Maestroservicioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Crear servicio', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#maestroservicios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."flag_blue.png");?> Conformidades</h1>


<div class="search-form" >
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maestroservicios-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'summarytext'=>'',
	//'filter'=>$model,
	'columns'=>array(
			//'item',
		    'numvale',
		    'cant',
			'desum',
			'comentario',
		    'preciounit',
		    'codcentro',
		   array('name'=>'numcot','header'=>'OC'),
		'item',
		'despro',
		'texto',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
		),
	),
)); ?>
