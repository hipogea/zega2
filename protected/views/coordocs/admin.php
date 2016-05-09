<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */

$this->breadcrumbs=array(
	'Coordocs'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Coordocs', 'url'=>array('index')),
	array('label'=>'Crear reporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#coordocs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Listado de reportes</h1>



<?php echo CHtml::link('Filtrar ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coordocs-grid',
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'nombrereporte',
		'modelo',
		'tamanopapel',
		'codocu',
		array('name'=>'codocu','value'=>'$data->documento->desdocu'),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
