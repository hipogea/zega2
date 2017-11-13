<?php
/* @var $this DespachoController */
/* @var $model Despacho */

$this->breadcrumbs=array(
	'Despachos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Despacho', 'url'=>array('index')),
	array('label'=>'Create Despacho', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#despacho-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1> Despachos</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'despacho-grid',
	'dataProvider'=>VwDespacho::model()->search_vigente(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'nombrepunto',
		'codalmacen',
		'codcentro',
		'ap',
		'am',
		'cant',
		'codart',
		'desum',
		'descripmaterial',
		'numdocref',
		'desdocu',
		'numvale',
		'movimiento',

		array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
				'delete'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/despacho/cargadetalle", array("identi"=>$data->hidvale))',
						'options' => array( 'ajax' => array('type' => 'GET', 'update'=>'#zona' ,'url'=>'js:$(this).attr("href")'),							
						) ,
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'hand_point.png',
						'label'=>'Ver detalle',
					),
			)
		),


	),
));
?>

<div id="zona"></div>


<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'despacho-grid',
	'dataProvider'=>VwDespacho::model()->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'codcentro',
		'codalmacen',
		'fechacreac',
		'fechaprog',
		'descripmaterial',
		'codart',
		'desum',
		'cant',
		'numvale',
		'movimiento',

		/*
		'responsable',
		'iduser',
		'vigente',

		array(
			'class'=>'CButtonColumn',
		),
	),
));*/
  ?>
