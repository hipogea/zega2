
             <?php 
					/*$this->Widget('ext.highcharts.HighchartsWidget', array(  
						'options'=>array(     
									'chart'=>array(
									'type'=>'area',
												),
									'title'=>array('text'=>'Acumulado pesca',),	
		
														'xAxis'=>array(
														'categories'=>array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
														//'categories'=>$fechas,
																'tickmarkPlacement'=>'on',
														'title'=>array(
														'enabled'=> false,
													),
											),
								'yAxis'=>array(
											'title'=>array(
											'text'=> ' Toneladas acumuladas',
												),
											'label'=>'formatter: function() {
													return this.value / 1000;}',              
              
												),	

								'tooltip'=>array(
												'shared'=> true,
												'valueSuffix'=>' TN',
												),		
									'plotOptions'=> array(
													'area'=>array(
													'stacking'=> 'normal',
													'lineColor'=> '#666666',
													'lineWidth'=> 1,
													' marker'=> array(
													'lineWidth'=> 1,
														'lineColor'=>'#666666',
														)
														)
														),	
											'series'=>array(
						array('name'=>'Jurel','data'=>array(502, 635, 809, 947, 1402, 3634, 5268)),
						//array('name'=>'Anchoveta','data'=>$pescas),
						//array('name'=>'meta','data'=>$meta),
						//array('name'=>'Anchoveta','data'=>$acumulado),
						//array('name'=>'metajurel','data'=>$metajurel),
						//array('name'=>'Jurel','data'=>$acumuladojurel),
						//array('name'=>'Anchoveta','data'=>array(106, 107, 111, 133, 221, 767, 1766)),
						//array('name'=>'oceania','data'=>array(18, 31, 54, 156, 339, 818, 1201)),
	  
									)
							)
						)
									);	 */
									
									
								$this->Widget('ext.highcharts.HighchartsWidget', array(
  
  'options'=>array(
     
	'chart'=>array(
                'type'=>'area',
				),
	'title'=>array('text'=>'Acumulado pesca',),	
		
	 'xAxis'=>array(
                //'categories'=>array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
				'categories'=>$fechas,
                'tickmarkPlacement'=>'on',
                'title'=>array(
                    'enabled'=> false,
					          ),
                    ),
	'yAxis'=>array(
                'title'=>array(
							'text'=> ' Toneladas acumuladas',
							),
               'label'=>'formatter: function() {
                        return this.value / 1000;}',              
              
            ),	

	 'tooltip'=>array(
                'shared'=> true,
                'valueSuffix'=>' TN',
            ),		
	'plotOptions'=> array(
                'area'=>array(
 				'stacking'=> 'normal',
                    'lineColor'=> '#666666',
                    'lineWidth'=> 1,
                   ' marker'=> array(
                        'lineWidth'=> 1,
                        'lineColor'=>'#666666',
                                )
                 )
            ),	
      'series'=>array(
						//array('name'=>'Jurel','data'=>array(502, 635, 809, 947, 1402, 3634, 5268)),
						//array('name'=>'Anchoveta','data'=>$pescas),
						//array('name'=>'meta','data'=>$meta),
						
						array('name'=>'Anchoveta','data'=>$acumulado),
						//array('name'=>'Meta','data'=>$meta),
						//array('name'=>'metajurel','data'=>$metajurel),
						//array('name'=>'Jurel','data'=>$acumuladojurel),
						//array('name'=>'Anchoveta','data'=>array(106, 107, 111, 133, 221, 767, 1766)),
						//array('name'=>'oceania','data'=>array(18, 31, 54, 156, 339, 818, 1201)),
	  
						)
			)
	  )
    );	 	
									
									
									
									
									
									
									
									
									
									
									
									
									
	 
            ?>