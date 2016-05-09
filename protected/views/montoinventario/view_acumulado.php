<?php
$datos=Montoinventario::datosgrafo('mes',3);

?>


<?php
								$this->Widget('ext.highcharts.HighchartsWidget', array(
    'options'=>array(
	'chart'=>array(
                'type'=>'area',
				),
	'title'=>array('text'=>'',),
	 'xAxis'=>array(
                'categories'=>$datos['absisas'],
					 'labels'=>array(
									                    'style'=>array(
															//'color'=>'#6D869F',
															 // 'fontWeight'=> 'bold',
															    'fontSize'=>'7px',
																),
									 
													),
                    ),
	'yAxis'=>array(
                'title'=>array(
							'text'=> ' Toneladas (TN/dia)',
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
                                ),
								
				'dataLabels'=>array(
                        'enabled'=> true,
						'style'=>array(
															//'color'=>'#6D869F',
															 // 'fontWeight'=> 'bold',
															    'fontSize'=>'
																7px',
																),
								)
                 ),
            ),	
      'series'=>$datos['ordenadas'],
			)
	  )
    );
            ?>