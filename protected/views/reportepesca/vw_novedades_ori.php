
<?php
//echo(date("Y/m/d",strtotime($fecha)));
//echo $modeloreportes->$fecha;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'novedades-grid',
	'dataProvider'=>VwReportepescanovedades::model()->search_fecha($fecha),
	//'filter'=>$model,
		'cssFile' => '/recurso/css/grid/estilogrid.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
             'nomep',
			// 'fecha',
			 array('name'=>'descri','value'=>''),
			 'descridetalle',
			 'criticidad',
			 'lugar',
			 'hora',
			 'latitud',
			 'meridiano',
array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'url'=>'$this->grid->controller->createUrl("/reportepesca/actualizanovedad",
																					array("novel"=>$data->idnovedad,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    
								
								 'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame5").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog5").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								
								
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/reportepesca/actualizanovedad",
																					array("novel"=>$data->idnovedad,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    
								
								 'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame5").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog5").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								
                                ),
								
								
								
								
								
								
								
								
								
								
								
								

                            ),
		),
		
	),
)); ?>

