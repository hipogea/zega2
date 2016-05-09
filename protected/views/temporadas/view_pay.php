<div style="float: left;  width:200px; height:200px">	

<?php  
						
				$this->Widget('ext.highcharts.HighchartsWidget', array(
												'options'=>array(
     
														'chart'=>array(
																'plotBackgroundColor'=> null,
																	'plotBorderWidth'=> null,
																'plotShadow'=> false
																		),
																	'title'=>array('text'=>'Cumplimiento cuota',),
																				'plotOptions'=>array(
																				'pie'=>array(
																				'allowPointSelect'=> true,
																				'cursor'=> 'pointer',
																				'dataLabels'=>array(
																				'enabled'=> true,
																					'color'=>'#000000',
																				'connectorColor'=> '#000000',
																				'formatter'=> 'function() {
																					return " "+ this.percentage +" % ";
																								}' 
																	),
																	),
																),
            

																'series'=> array( 
																					array( 
																						'type'=> 'pie',
						//'name'=> 'Porcentaje cumplimiento',
																							'data'=> array( 
								//array('Cuotarrrrrrr asignada',  1),								//array('IE',       26.8),								
																										array('Pendiente', 34),
																										array('Capturado',66),
								//array('ert',100),
							//	array('Ckyuououuota asignada',80.9),
								//array('Cuota asignada',9),
								//array('Opera',     100),
								//array('Others',   0.7),
																							)
																									),
																		),

	
																			)
										));
					$this->Endwidget();
										
					?>
</div>