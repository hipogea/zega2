<?php
/* @var $this TipoactivosController */
/* @var $model Tipoactivos */
if($this->beginCache('cache_doci_admin_estatico',array(
    'duration'=>600,))) {
    

$this->breadcrumbs=array(
	'Tipoactivoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Tipoactivos', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipoactivos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php MiFactoria::titulo('Tipos de Activos disponibles', 'gear') ?>
    <?php $this->endCache('cache_doci_admin_estatico'); }   ?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipoactivos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'codtipo',
		'destipo',
		'activo',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
