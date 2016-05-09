		<?php
		$this->Widget('ext.highcharts.HighchartsWidget', array(
			'options'=>array(
								'chart'=>array(
												'plotBackgroundColor'=> null,
												'plotBorderWidth'=> null,
												'plotShadow'=> false
											),
								'title'=>array('text'=>'.',),
								'plotOptions'=>array(
														'pie'=>array(
																	'allowPointSelect'=> true,
																	'cursor'=> 'pointer',
																	'dataLabels'=>array(
																						'enabled'=> true,
																						'color'=>'#000000',
																						'connectorColor'=> '#000000',
																						'formatter'=> 'function() {	return " "+ this.percentage +" % ";}'
																						),
															'showInLegend'=> true,
														),

															),
				'series'=> array(
									array(
										'type'=> 'pie',
										'data'=> array(
														array('Pendiente', 34),
														array('Capturado',66),
														array('Espera',14),
														),

										),
									),
				)
		));
		?>