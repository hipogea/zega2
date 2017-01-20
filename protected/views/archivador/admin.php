<?php
/* @var $this ArchivadorController */
/* @var $model Archivador */

$this->breadcrumbs=array(
	'Archivadors'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Archivador', 'url'=>array('index')),
	array('label'=>'Subir archivo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('archivador-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."arrow_down.png");?>   Descargas utiles</h1>

<?php
 yii::log('Pintado de arbol', 'error');
$this->widget('CTreeView',array(
    'id'=>'unit-treeview',
    'url'=>array('request/fillTree'),
    'htmlOptions'=>array(
        'class'=>'treeview-red'
    )
));


?>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'archivador-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'summaryText'=>'.',
	'columns'=>array(
		//'id',
		array('name'=>'documentos_documento','header'=>'Clase','value'=>'$data->documento->desdocu'),
		//'nombre',
		array('name'=>'extension','type'=>'raw', 'value'=>' CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].substr($data->extension,1).".gif"), "", array("target"=>"_blank"))'),

		'extension',
		//'documento.desdocu',
		array('name'=>'desarchivo','header'=>'Descripcion'),
		//'obsarchivo',
		'fechasubida',
		array('name'=>'ndescargas','header'=>'Nº Descar'),
		'autor',
		
		array('name'=>'peso','value'=>'$data->peso." KB"',),
		
		
		array(
            'class'=>'CLinkColumn',
            'header'=>Yii::t('ui','Descargar'),
            'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'baja.gif',
            //'labelExpression'=>'$data->nombre',
            'urlExpression'=>'Yii::app()->baseUrl."/assets/DESCARGAS/".$data->nombre.$data->extension',
            'htmlOptions'=>array('target'=>'blank'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
