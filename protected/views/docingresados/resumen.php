<?php 

	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
			'chart'=>array(
				'type'=>'column',
                                    ),
				'title'=>array(
					'text'=>'Ponderado Horas y Monto',
						),
                                'xAxis'=> ARRAY(
                                    'categories'=>$proveedores,
                                    'labels'=>array('rotation'=>-60,
                                        'style'=>array(
                                                //'color'=>'#6D869F',
                                                // 'fontWeight'=> 'bold',
                                                 'fontSize'=>'10px',
                                                     ),
					             ),
						),

				'yAxis'=>array(

						'min'=> 0,

						'title'=>array(
								'text'=> ' Promedio Horas x Monto ',
							    ),
						'stackLabels'=>array(
                                                                    'enabled'=> true,
								   'style'=>array(
										'fontWeight'=> 'bold',
										'color'=> 'gray',
                                                                                ),
									 ),

						),
					'legend'=> array('align'=>'right',
								'x'=> -100,
								'verticalAlign' =>'top',
								'y'=> 20,
								'floating'=> true,
								'backgroundColor'=> 'white',
								'borderColor'=> '#CCC',
								'borderWidth'=> 1,
								'shadow'=>false,
								),
				'tooltip'=>ARRAY(
								'pointFormat'=>'<span style="color:{series.color}">
								   {series.name}</span>: <b>{point.y}</b> 
								   <br/>',

                                'shared'=> true,

								'valueDecimals'=>2,		//}',

								),

           /* 'plotOptions'=> array(
					'column'=>array(
							'stacking'=> 'normal',
                    '					dataLabels'=>array(
								'enabled'=> true,
								'color'=> 'white',
									),
							)
					),*/
			'series'=>array(
						array(
							'name'=>'Ponderado',
							'data'=>$montodinero,
							'color'=>'#ACFA58', 
								) , 
                            array(
							'name'=>'Horas Prom',
							'data'=>$horas,
							'color'=>'#FF00FF', 
								) , 

                          
                            
					
								),
       
			)

			)

			);
	?>

<br>
<?php 


	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
		'theme'=>'dark-green', 	
       'chart'=>array(
				'type'=>'column',
                                    ),
				'title'=>array(
					'text'=>'Horas promedio de proceso',
						),
                                'xAxis'=> ARRAY(
                                    'categories'=>$proveedoresabs,
                                    'labels'=>array('rotation'=>-60,
                                        'style'=>array(
                                                'color'=>'#6D869F',
                                                 'fontWeight'=> 'bold',
                                                 'fontSize'=>'15px',
                                                     ),
					             ),
						),

				'yAxis'=>array(

						'min'=> 0,

						'title'=>array(
								'text'=> 'Promedio Horas',
							    ),
						'stackLabels'=>array(
                                                                    'enabled'=> true,
								   'style'=>array(
										'fontWeight'=> 'bold',
										'color'=> 'gray',
                                                                                ),
									 ),

						),
					'legend'=> array('align'=>'right',
								'x'=> -100,
								'verticalAlign' =>'top',
								'y'=> 20,
								'floating'=> true,
								'backgroundColor'=> 'white',
								'borderColor'=> '#CCC',
								'borderWidth'=> 1,
								'shadow'=>false,
								),
				'tooltip'=>ARRAY(
								'pointFormat'=>'<span style="color:{series.color}">
								   {series.name}</span>: <b>{point.y}</b> 
								   <br/>',

                                'shared'=> true,

								'valueDecimals'=>2,		//}',

								),

            'plotOptions'=> array(
					'column'=>array(
							'stacking'=> 'normal',
                    '					dataLabels'=>array(
								'enabled'=> true,
								'color'=> 'white',
									),
							)
					),
			'series'=>array(
						array(
							'name'=>'Horas promedio Tenencia 100',
							'data'=>$horas100,
							'color'=>'#FF00FF', 
								) , 
                                                 array(
							'name'=>'Horas promedio Tenencia 200',
							'data'=>$horas200,
							'color'=>'#FFaaFF', 
								) , 
                            
					
								),
       
			)

			)

			);
	?>


<br>
<?php 

//var_dump($proveedorescanti);echo "<br>";

	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
		'theme'=>'dark-green', 	
       'chart'=>array(
				'type'=>'column',
                                    ),
				'title'=>array(
					'text'=>'Porveedores y Cantidad de Documentos en proceso',
						),
                                'xAxis'=> ARRAY(
                                    'categories'=>$proveedorescanti,
                                    'labels'=>array('rotation'=>-60,
                                        'style'=>array(
                                                'color'=>'#6D869F',
                                                 'fontWeight'=> 'bold',
                                                 'fontSize'=>'15px',
                                                     ),
					             ),
						),

				'yAxis'=>array(

						'min'=> 0,

						'title'=>array(
								'text'=> 'Promedio Horas',
							    ),
						'stackLabels'=>array(
                                                                    'enabled'=> true,
								   'style'=>array(
										'fontWeight'=> 'bold',
										'color'=> 'gray',
                                                                                ),
									 ),

						),
					'legend'=> array('align'=>'right',
								'x'=> -100,
								'verticalAlign' =>'top',
								'y'=> 20,
								'floating'=> true,
								'backgroundColor'=> 'white',
								'borderColor'=> '#CCC',
								'borderWidth'=> 1,
								'shadow'=>false,
								),
				'tooltip'=>ARRAY(
								'pointFormat'=>'<span style="color:{series.color}">
								   {series.name}</span>: <b>{point.y}</b> 
								   <br/>',

                                'shared'=> true,

								'valueDecimals'=>2,		//}',

								),

           /* 'plotOptions'=> array(
					'column'=>array(
							'stacking'=> 'normal',
                    '					dataLabels'=>array(
								'enabled'=> true,
								'color'=> 'white',
									),
							)
					),*/
			'series'=>array(
						array(
							'name'=>'Horas promedio',
							'data'=>$cantidades,
							'color'=>'#FF4000', 
								) , 

                            
					
								),
       
			)

			)

			);
	?>
