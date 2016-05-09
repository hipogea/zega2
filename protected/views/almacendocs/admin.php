<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */

$this->breadcrumbs=array(
	'Almacendocs'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear Documento', 'url'=>array('crearvale')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),


);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#almacendocs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Documentos de Almacen</h1>




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacendocs-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
	    'numvale',
		'fechavale',
		'almacendocs_almacenmovimientos.movimiento',
		'codcentro',
		'codalmacen',
		'almacendocs_estado.estado',
		'fechacre',		
		'fechacont',
		'docureferencia.desdocu',
		'numdocref',
		
		/*
		'numvale',
		'codtipovale',
		'codtrabajador',
		'codalmacen',
		'codcentro',
		'cestadovale',
		'correlativo',
		'codocu',
		'id',
		'fechacont',
		'fechacre',
		'numdocref',
		'posic',
		'codocuref',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
			'buttons'=>array(


				'update'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/almacendocs/editar/",array("id"=>$data->id)  )',

						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png',
						'label'=>'Actualizar Item',
					),

				'view'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/Almacendocs/ver/",array("id"=>$data->id))',
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'view.png',
						'label'=>'Visualizar...',
					),

			),
		),
	),
)); ?>
