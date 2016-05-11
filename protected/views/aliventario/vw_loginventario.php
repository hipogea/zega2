

<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(

							'chart'=>array(
											'type'=>'area',
								        ),

	   'title'=>array(
		   			'text'=>'erage Temperature',
           			'x'=> -20
                        ),
        'subtitle'=>array(
						'text'=>'Source: WorldClimate.com',
            			'x'=> -40
                      ),
        'xAxis'=>array(
				'categories'=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
						'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
						),
        'yAxis'=> array(
	'title'=>array(
		'text'=>'Temperature (°C)'
				),
	'plotLines'=>array(
				'value'=>0,
                'width'=> 2,
                'color'=>'#808080'
                   ),

                   ),

        'tooltip'=>array (
				'valueSuffix'=> '°C'
					),
        'legend'=>array(
				'layout'=> 'vertical',
            'align'=>'right',
            'verticalAlign'=>'middle',
            'borderWidth'=> 0
             ),


        'series'=>array(
array(
			'name'=>'Tokyo',
            'data'=>array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6),
        ),
	array(
		'name'=>'New York',
		'data'=>array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5),
	),
	array(
		'name'=>'Berlin',
		'data'=>array(-0.9, 0.8, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0),
	),


			)
			)
			)

	);
			
			
		//echo json_encode($descargada); 		
			
	?>	


 	