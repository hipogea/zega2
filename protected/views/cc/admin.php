<?php
/* @var $this CcController */
/* @var $model Cc */

$this->breadcrumbs=array(
	'Ccs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Crear centro de costo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cc-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>CENTROS DE COSTOS</h1>



<?php echo CHtml::link('Busqueda','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'cc-grid',
	'mergeColumns' => array('codgrupo','grupo.desgrupo','grupo.clase.desclasecolector'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'grupo.clase.codclasecolector',
		'grupo.clase.desclasecolector',
		'codgrupo',
		'grupo.desgrupo',
		'codc',
		//'cc',
		//'centro',
		'desceco',
		/*
		'modificadopor',
		'modificadoel',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
