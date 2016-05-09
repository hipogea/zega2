


<?php 
	/*$this->Widget('ext.highcharts.HighchartsWidget', array(
						
					'options'=>array(
   
						// Radialize the colors
						
   
							'chart'=>array(
											'plotBackgroundColor'=>null,
											'plotBorderWidth'=> null,
											'plotShadow'=> false
								        ),
							 'tooltip'=>array(
							         'pointFormat'=>'{series.name}: <b>{point.percentage:.1f}%</b>',

								),	

								
								
				
            'plotOptions'=> array(
							'pie'=>array(
							'allowPointSelect'=> true,
							 'cursor'=> 'pointer',
								'dataLabels'=>array(
										'enabled'=> true,
										'color'=> '#000000',
										'connectorColor'=> '#000000',
										'format'=> '<b>{point.name}</b>: {point.percentage:.1f} %'
								)
							)

							),		
				
			'series'=>array( 
						'type'=>'pie',
						'name'=>'Pesca descragada ',
						 'data'=>array( 45.0,
										26.8,
										12.8,
										8.5,
										6.2,
										0.7,										
						              ),
									  
						
					
								
								),
			)
			)
			);
			
			*/
			
		$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
     
	'chart'=>array(
                'plotBackgroundColor'=> null,
                'plotBorderWidth'=> false,
                'plotShadow'=> false,
				'height'=>200,
				'width'=>200,
             ),
	'title'=>array('text'=>'',),
	    'plotOptions'=>array(
                'pie'=>array(
                    'allowPointSelect'=> true,
                    'cursor'=> 'pointer',
                    'dataLabels'=>array(
                        'enabled'=> true,
                        'color'=>'#000000',
                        'connectorColor'=> '#000000',
                        'formatter'=> 'function() {
                            return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";
                        }' 
						),
						 'showInLegend'=> true,
                    ),
                ),
            
            'legend'=>array('width'=>120,'margin'=>10,'padding'=>4,'borderWidth'=>0,'itemStyle'=>array(
											'cursor'=> 'pointer',
											'color'=> '#274b6d',
											'fontSize'=> '8px'
												)),
			 'series'=> array( 
			     array( 
						'type'=> 'pie',
						'name'=> 'Participacion   ',
						'data'=> array( 
								array('Pesca propia',   23.5),
								array('Pesca terceros', 76.5),								
								
									)
						),
						),

	
     )
  ));	
			 
		//echo json_encode($descargada); 		
			
	?>	

	
 	