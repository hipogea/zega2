
  
	<div class="cuadrito" >
   


<?php 

	 $this->Widget('ext.highcharts.HighchartsWidget', array(
				'options'=>array(
							'chart'=>array(
											'type'=>'column',
								        ),
							 'title'=>array(
							         'text'=>'Centro '.$nombrecentro.'  -  '.round($stockcentro,2),
								),	

								'xAxis'=> ARRAY(
								 // 'categories'=>ARRAY('001','002','003','004'),
								'categories'=>$almacenes,
									 'labels'=>array('rotation'=>-40,
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
														'text'=> 'Valor de inventario en  (Soles x 1000)',
													),
								     
										'stackLabels'=>array(
															'enabled'=> true,
															'style'=>array(
																			'fontWeight'=> 'bold',
																			'color'=> 'gray',
																			
																			),
															
															 ),
									),

					
		
				
            'plotOptions'=> array(
							'column'=>array(
											'stacking'=> 'normal',
                    '						dataLabels'=>array(
											'enabled'=> true,
											'color'=> 'white',
												),
											)
							),		
				
			'series'=>array( 
			
						array(
							'name'=>'Total',
							'data'=>$stocks,
							//'data'=>array(20,30,15,36),
							'color'=>'#FFB13D', 

								) , 
				
								
								),
			)
			)
			);
			
			
		//echo json_encode($descargada); 		
			
	?>	

	</div>
 	
	