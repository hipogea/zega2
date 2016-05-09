

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'mensajes-grid',
	'dataProvider'=>$proveedor,

	//'filter'=>$model,
	'columns'=>array(
		//'id'
		'correodestinatario'	,
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{aprobar}',
			'buttons'=>array(
				    		 
               'update'=>
                            array(
                                   'visible'=>'false',

                                    
                                ),
				'delete'=>
                            array(
                                    'visible'=>'false',

									
                                ),
				    



					'aprobar'=>
                             array(
                                    'url'=>'$this->grid->controller->createUrl("/eventos/borrarmensaje",
																					array("id"=>$data->id,																					      
																						
																								
																							)
																				)',
							 'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("mensajes-grid")}')) ,        
						    'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'tacho.jpg', 
								'label'=>'Aprobar', 
                                ),	
							
				),
		),


		
	),
)); ?>
<?php

$createUrl = $this->createUrl('/eventos/creadestinatario',
										array(
										        "id"=>$model->id,
												"asDialog"=>1,
												"gridId"=>'mensajes-grid',
												//"codpro"=>$model->codpro,
											)
							);
 echo CHtml::link('Agregar direccion','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));


?>