<?php
/* @var $this DetercuentasController */
/* @var $model Detercuentas */

$this->breadcrumbs=array(
	'Detercuentases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Detercuentas', 'url'=>array('index')),
	array('label'=>'Create Detercuentas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#detercuentas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php MiFactoria::titulo('Determinacion de cuentas','package'); ?>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$this->widget('ext.groupgridview.GroupGridView', array(
'id' => 'grid-detercuentas',
'dataProvider'=>$model->search(),
'mergeColumns' => array('codcatval','descat','codop','desop'),
'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		ARRAY('name'=>'id','visible'=>false),
		array('name'=>'activo','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->activo=="1")?true:false,array("disabled"=>"disabled"))'),
		'codcatval',
		'descat',
		'codop',
		//array('name'=>'codop','type'=>'raw','value'=>'CHtml::link($data->codop,Yii::app()->createurl(\'/detercuentas/update\', array(\'id\'=> $data->codop ) ) )'),
		'desop',
		'cuentadebe',
		'debe',
		'cuentahaber',
		'haber',

		array(
			'htmlOptions'=>array('width'=>20),
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(


				'update'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/contabilidad/detercuentas/update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
						'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
						'label'=>'Actualizar Item',
					),




			),
		),
	),
)); ?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>400,
		'border'=>0,
	),
));
?>
	<iframe id="cru-detalle" style="border:0px; width:100%; height:100%;" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>