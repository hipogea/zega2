<?php
/* @var $this SolpeController */
/* @var $model Solpe */

$this->breadcrumbs=array(
	'Solpes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Crear solicitud', 'url'=>array('create')),
);


?>

<h1>Aprobacion de Solicitudes de pedido</h1>


<div id="AjFlash" class="flash-regular"></div>


<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'solpe-grid',
	'dataProvider'=>$model->searchliberacion(),
	//'filter'=>$model,
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_celeste.css',
	'mergeColumns' => array('numsolpe'),
	'columns'=>array(
		array('name'=>'numsolpe','type'=>'raw','value'=>'CHtml::link($data->numsolpe,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->identidad) ) )'),
		
		//'numsolpe',
		'item',
		'cant',
		'desum',
		'codart',
		'txtmaterial',
		array('name'=>'fechacrea','value'=>'date("d/m/y",strtotime($data->fechacrea))'),
		array('name'=>'fechaent','value'=>'date("d/m/y",strtotime($data->fechaent))'),
		'codal',		
		'centro',
		'usuario',
		'imputacion',
		array('name'=>'punitplan','value'=>'MiFactoria::decimal($data->punitplan)'),
		array('name'=>'compra','type'=>'html','value'=>'($data->escompra=="1")?CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."basket.png"):CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png")','htmlOptions'=>array('width'=>10)),
		//'est',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{aprobar}',
			'htmlOptions'=>array('width'=>20),
			'buttons'=>array(


					'aprobar'=>
                             array(
                                    'url'=>'$this->grid->controller->createUrl("/solpe/Aprobar",
																					array("id"=>$data->id,																					      
																						
																								
																							)
																				)',
							 'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("solpe-grid"); $("#AjFlash").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");}')) ,
							// 'options' => array( 'ajax' => array('type' => 'GET', 'success' => "js:function() { $.fn.yiiGridView.update('detalle-grid'); }" ,'url'=>'js:$(this).attr("href")')) ,
						    'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'check.png', 
								'label'=>'Aprobar', 
                                ),	
							
				),
		),
	),
)); ?>
