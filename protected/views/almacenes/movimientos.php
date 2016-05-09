<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacenesopciones-grid',
	'dataProvider'=>Almacentransacciones::model()->search_por_almacen($model->codalm),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codal',
		'codmov',
		'movimientos.movimiento',
		array('name'=>'activo','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->activo=="1")?true:false,array("disabled"=>"disabled"))'),

		array(
			'htmlOptions'=>array('width'=>15),
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
			'buttons'=>array(
				'view' => array
				(
					'visible'=>'($data->activo=="1")?false:true',
					'label'=>' Activar',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'ok.png',
					'click'=>"function(){
                                    $.fn.yiiGridView.update('almacenesopciones-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('almacenesopciones-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
					'url'=>'$this->grid->controller->createUrl("/Almacenes/cambiaestatusmov",array("codal"=>$data->codal,"codmov"=>$data->codmov))',

				),
				'update'=>
					array(
						'visible'=>'(!$data->activo=="1")?false:true',
						'label'=>' Desactivar',
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'error.png',
						'click'=>"function(){
                                    $.fn.yiiGridView.update('almacenesopciones-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('almacenesopciones-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
						'url'=>'$this->grid->controller->createUrl("/Almacenes/cambiaestatusmovan",array("codal"=>$data->codal,"codmov"=>$data->codmov))',

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
		'title'=>'Favorito',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>400,
		'show'=>'Transform',
	),
));
?>
	<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>