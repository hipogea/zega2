<?php
/* @var $this ConfiguracionController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Settings', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('/configuracion/creaparametro')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#settings-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Objetos de configuracion', 'ruler_triangle');?>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'settings-grid',
	'dataProvider'=>$model->search(),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
            array('name'=>'id','type'=>'raw','header'=>'Id','value'=>'CHtml::link("editar",yii::app()->createUrl("configuracion/editar",array("id"=>$data->id )   )  )', 'htmlOptions'=>array('width'=>10),),
		'codcen',
            'codparam',
		array('name'=>'codparam','header'=>'Parametro','value'=>'$data->parametros->desparam', 'htmlOptions'=>array('width'=>400),),
		'iduser',
		 array('name'=>'codocu','header'=>'Documento','value'=>'$data->documentos->desdocu','filter'=>CHTml::listData(Documentos::model()->findAll(),'coddocu','desdocu'), 'htmlOptions'=>array('width'=>400),),
		// 'documentos.desdocu',
            array('name'=>'valor','type'=>'raw','value'=>'substr(trim($data->valor),0,40)', 'htmlOptions'=>array('width'=>60)),
		
	),
)); ?>
