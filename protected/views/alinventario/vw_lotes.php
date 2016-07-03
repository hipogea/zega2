<?php

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alkardex-griggdXX',
	'dataProvider'=>Lotes::model()->search_por_inventario($model->id,($model->getControlPrecio()=='F') ?"ASC":"DESC"),
	// 'dataProvider'=>VwKardex::model()->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		//'numkardex',
		'id',
		'orden',
        'numlote',
		'fechafabri',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),
        'cant',
		'inventario.maestro.maestro_ums.desum',
		'fechaingreso',
		'fechavenc',
		'punit',
		array(
			'htmlOptions'=>array('width'=>40),
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
			'buttons'=>array(
				'update'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/alinventario/editalote/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
																				)
									    )',
						'click'=>('function(){

							    $("#cru-dialogdetalle").dialog("open");
										$("#cru-detalle").attr("src",$(this).attr("href"));
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
						'label'=>'Actualizar Lote',
					),



				'view'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/alinventario/visualizalote/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"no",

											)
									    )',
						'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'box.png',
						'label'=>'Visualizar',
					),

			),
		),

    ),
)); ?>
