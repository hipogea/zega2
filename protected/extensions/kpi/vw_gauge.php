<?php
//$startAngle
//$endAngle
//$step
//$texto
//$rangocolores=array(array('from'=>0,'to'=>20,'color'=>"fff"),array(...)
//$valor  
//$sufix

 $this->Widget('ext.highcharts.HighchartsWidget', array(  
						'options'=>array(     
									'chart'=>array(
												'type'=>'gauge',
												'plotBackgroundColor'=> null,
												'plotBackgroundImage'=> null,
												'plotBorderWidth'=>0,
												'plotShadow'=> false,
												),
									
									'title'=> array(
												'text'=> 'Indicador de avance'
											),	
									'pane'=> array (
												'startAngle'=> $startAngle,
												'endAngle'=> $endAngle,
														'background'=>array(	array(
																			'backgroundColor'=>array( 
																										'linearGradient'=>array( 'x1'=> 0, 'y1'=> 0, 'x2'=> 0, 'y2'=> 1 ),
																										'stops'=>array(
																													array(0, '#FFF'),
																													array(1, '#444')
																													)
																										),
																			'borderWidth'=> 0,
																			'outerRadius'=> '109%'
																					), 
																					array(
																			'backgroundColor'=> array(
																							'linearGradient'=> array( 'x1'=> 0, 'y1'=> 0, 'x2'=> 0, 'y2'=> 1),
																							'stops'=>array(
																												array(0, '#333'),
																												array(1, '#FFF')
																											)
																									),
																			'borderWidth'=> 1,
																			'outerRadius'=>  '107%'
																						), 
																					array(),
	            // default background
																
																	ARRAY(
																			'backgroundColor'=> '#DDD',
																'borderWidth'=> 0,
																'outerRadius'=> '105%',
																'innerRadius'=> '103%'
																			))
																),	
									
														 // the value axis
									'yAxis'=>ARRAY(
												'min'=> 0,
												'max'=> 200,
	        
												'minorTickInterval'=> 'auto',
												'minorTickWidth'=> 1,
												'minorTickLength'=> 10,
												'minorTickPosition'=> 'inside',
												'minorTickColor'=> '#666',
	
												'tickPixelInterval'=> 30,
												'tickWidth'=> 2,
												'tickPosition'=> 'inside',
												'tickLength'=> 10,
												'tickColor'=> '#666',
												'labels'=> ARRAY(
														'step'=> $step,
														'rotation'=> 'auto'
														),
												'title'=> array(
													'text'=> $texto
														),
												'plotBands'=> $rangocolores      
											),
									
									'series'=>array(
												array(
														'name'=> 'Speed',
														'data'=> array($valor),
											'tooltip'=> array(
															'valueSuffix'=> $sufix
														)
													))
									)
									)
									);

Yii::app()->clientScript->registerScript('test', "
    function (chart) {};
", 1 );


?>
