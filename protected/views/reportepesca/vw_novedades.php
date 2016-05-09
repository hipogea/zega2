
<?php
//echo(date("Y/m/d",strtotime($fecha)));
//echo $modeloreportes->$fecha;
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'novedades-grid',
	'dataProvider'=>VwReportepescanovedades::model()->search_fecha($fecha),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	//'cssFile' => ''.Resuelveruta::Arreglaruta(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css'),  // your version of css file
	

	'summaryText'=>'',
	'columns'=>array(
             'nomep',
			// 'fecha',
			 //'descri',
			 array('name'=>'descri', 'type'=>'raw','value'=>
			  'CHtml::link($data->descri,"#" , array(\'onclick\'=>\'$("#cru-frame5").attr("src","\'.Yii::app()->createurl(\'/reportepesca/actualizanovedad\', array(\'novel\'=> $data->idnovedad, \'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialog5").dialog("open"); return false;\',))' ),
			 'descridetalle',
			 'criticidad',
			 array('name'=>'ultimares','header'=>'ultima_respuesta_evento___'),
			 'lugar',
			 'hora',
			 'latitud',
			 'meridiano',
array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'update'=>
                            array(
                                   
								'url'=>'$this->grid->controller->createUrl("/reportepesca/respondenovedad",
																					array("novel"=>$data->idnovedad,
																							"id"=>$data->id,
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    
								
								 'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame6").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog6").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								
								
                                ),
						 
                        'view'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/reportepesca/actualizanovedad",
																					array("novel"=>$data->idnovedad,																					      
																							"asDialog"=>1,
																							"id"=>$data->id,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    
								
								 'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame5").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog5").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								
                                ),
								
							 'delete'=>	
							array(
                                    'url'=>'$this->grid->controller->createUrl("/novedades/delete",
																					array("id"=>$data->idnovedad,																					      

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

