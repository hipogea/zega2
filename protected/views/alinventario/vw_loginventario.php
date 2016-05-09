






<?php
$this->Widget('ext.highcharts.HighchartsWidget',
	array(
		'options'=>array(

			'title'=>array('text'=>'Evolucion del stock',),
			'xAxis'=>array(
				'categories'=>array(1,2,3,4,5),
				'labels'=>array(
					'style'=>array(
						//'color'=>'#6D869F',
						// 'fontWeight'=> 'bold',
						'fontSize'=>'14px',
					),
				),
			),
			'yAxis'=>array(
				'title'=>array(
					'text'=> ' Toneladas (TN/dia)',
				),
				'min'=>0,
				/*'label'=>'formatter: function() {
                return this.value / 1000;}',*/
			),

			'tooltip'=>array(
				'shared'=> true,
				'valuePrefix'=>' S/. ',
			),
			'plotOptions'=> array(
				'line'=>array(
					'stacking'=> 'normal',
					'lineColor'=> '#666666',
					'lineWidth'=> 1,
					' marker'=> array(
						'lineWidth'=> 1,
						'lineColor'=>'#666666',
					),

					'dataLabels'=>array(
						'enabled'=> true,
						'style'=>array(
							//'color'=>'#6D869F',
							// 'fontWeight'=> 'bold',
							'fontSize'=>'
																				10px',
						),
					)
				),
			),

		'series'=>array(
	                    array(
	            'type'=>'line',
	 			'name'=>'Regresion line',
				'data'=>array(array(0,1.11),array(5,4.51)),
				'marker'=>array(
							'enabled'=>false,
								),
					'states'=>array(
								'hover'=>array('linewidth'=>0),
								),
	               'enabledMouseTracking'=>false,
				),
	                array(
						'type'=>'scatter',
						'name'=>'Observations',
						'data'=>array(1, 1.5, 2.8, 3.5, 3.9, 4.2),
						'marker'=>array('radius'=>4),
					)
               )
		)
	)
);
?>


<?php
$this->Widget('ext.highcharts.HighchartsWidget',
	 array(
				'options'=>array(
							'chart'=>array(
										'type'=>'line',
								'backgroundColor'=>"#F5F6CE",
								'borderColor'=>"#F7BE81",
								'borderWidth'=>1,
								'height'=>300,
								'plotBackgroundColor'=>'#D0F5A9',
								'plotBorderColor'=>'#86B404',
								'plotBorderWidth'=>1,
								//'margin'=>10,
								//'width'=>900,
											),
							'title'=>array('text'=>'Evolucion del stock',),
							'xAxis'=>array(
										'categories'=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
															'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
										  					),
							'labels'=>array(
										'style'=>array(
											//'color'=>'#6D869F',
												// 'fontWeight'=> 'bold',
												'fontSize'=>'14px',
														),
							                	),
											),
							'yAxis'=>array(
									'title'=>array(
												'text'=> ' Toneladas (TN/dia)',
													),
									/*'label'=>'formatter: function() {
									return this.value / 1000;}',*/
											),

							'tooltip'=>array(
									'shared'=> true,
									'valuePrefix'=>' S/. ',
											),
							'plotOptions'=> array(
										'line'=>array(
										'stacking'=> 'normal',
										'lineColor'=> '#666666',
										'lineWidth'=> 1,
										' marker'=> array(
														'lineWidth'=> 1,
														'lineColor'=>'#666666',
														),

											'dataLabels'=>array(
															'enabled'=> true,
																'style'=>array(
																//'color'=>'#6D869F',
															// 'fontWeight'=> 'bold',
																		'fontSize'=>'
																				10px',
																				),
																)
													),
											),
'series'=>array(
array('name'=>'Libre','data'=>array(896502, 1324635,989809, 888947, 1125402, 1223634, 1145268,1156989,1157878,1127878,1137878,978456)),
	array('name'=>'Total','data'=>array(636502, 954635,749809,718947, 1135402, 623634, 1025268,1036989,1167878,867878,777878,658456)),

)
)
)
);

?>