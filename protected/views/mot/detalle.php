

<?php
//ALTER TABLE mot_mat_det ADD COLUMN canti double precision;

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mot-mat-det-grid',
	'dataProvider'=>Motmatdet::model()->search_pedido($model->isNewRecord ?Yii::app()->session['numeropedido']:$model->id),
	//'filter'=>$model,
	'summaryText'=>'Para agregar un registro presione el boton inferior',
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_gridpartes.css',  // your version of css file
	
	'columns'=>array(
		//'id',
		//'hidmot',
		'item',
		'cantidad',
		'maestrito.um',
		'codigo',
		//'descripcion',
		array('name'=>'descripcion','value'=> 'empty($data->codigo) ?$data->descripcion  : $data->maestrito->descripcion'    ),
		'obs',
		'codigoequipo',
		'estadito.estado',
		//'equipito.descripcion',
		/*
		'um',
		'codigoequipo',
		'creadopor',
		'creadoel',
		'modificadoel',
		'modificadopor',
		'estado',
		'codocu',
		*/
		array(
			'class'=>'CButtonColumn',
			
			
			

			'template'=>'{update}{delete}{aprobar}',
				'deleteConfirmation'=>"js:'¿ Realmente quiere procesar este registro ?'",
				//'aprobarConfirmation'=>"js:'¿ Realmente quiere procesar este registro ?'",
			 'buttons'=>array(
			 
			 
			 

			  
						 
               'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/motmatdet/update",
																					array("id"=>$data->id,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id,
																								"naleatorio"=>$data->hidmot,
																							)
																				)',
                                    'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-detalle").attr("src",$(this).attr("href")); 
									                     $("#cru-dialogdetalle").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								//'imageUrl'=>Yii::app()->request->baseUrl.'/css/grid/mas.jpg', 
								'label'=>'Modificar', 
                                ),
				'delete'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/motmatdet/delete",
																					array("id"=>$data->id,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    
								//'imageUrl'=>Yii::app()->request->baseUrl.'/css/grid/lista.jpg', 
								'label'=>'anular', 
									
                                ),
								
				'aprobar'=>
                             array(
                                    'url'=>'$this->grid->controller->createUrl("/motmatdet/aprobar",
																					array("id"=>$data->id,																					      
																						
																								
																							)
																				)',
							 'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("mot-mat-det-grid")}')) ,        
						    'imageUrl'=>''.Resuelveruta::ArreglaRuta(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid']).'hint.png', 
								'label'=>'Aprobar', 
                                ),	
							

                            ),
		),
	),
)); ?>
