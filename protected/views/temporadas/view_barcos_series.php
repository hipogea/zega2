		<?php $this->renderpartial("vw_resumen_barco",array('id'=>$id,
														'codep'=>$codep,
														'idespecie'=>$idespecie,
														'matrices'=>$matrices,
														)); 
		
		
		?>

             <?php 
					    
						//echo " elk graficoesta aqui ";	
							//	print_r($matrices['eficiencias']);
								$this->Widget('ext.highcharts.HighchartsWidget', array(
  
  'options'=>array(
     
	'chart'=>array(
                'type'=>'area',
				),
	'title'=>array('text'=>'Indicadores de operacion : '.$matrices['nombrebarco'],),	
		
	 'xAxis'=>array(
                //'categories'=>array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
				'categories'=>$matrices['fechas'],
                'tickmarkPlacement'=>'on',
                'title'=>array(
                    'enabled'=> false,
					          ),
                    ),
	'yAxis'=>array(
                'title'=>array(
							'text'=> ' Valores',
							),
               'label'=>'formatter: function() {
                        return this.value / 1;}',              
              
            ),	

	 'tooltip'=>array(
                'shared'=> true,
                'valueSuffix'=>'',
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
						array('name'=>'Eficiencia bodega (%)','data'=>$matrices['eficiencias']),
						array('name'=>'Descargada','data'=>$matrices['pescas']),
						array('name'=>'Horas Trabajadas','data'=>$matrices['horastrabajadas']),
						array('name'=>'D2 por Hora (GL/Hr)','data'=>$matrices['combustibleporhora']),
						array('name'=>'D2 por Tonelada (Gl/Hr)','data'=>$matrices['combustibleportonelada']),
						//array('name'=>'metajurel','data'=>$metajurel),
						//array('name'=>'Jurel','data'=>$acumuladojurel),
						//array('name'=>'Anchoveta','data'=>array(106, 107, 111, 133, 221, 767, 1766)),
						//array('name'=>'oceania','data'=>array(18, 31, 54, 156, 339, 818, 1201)),
	  
						)
			)
	  )
    );	 	
									
									
									
									
									
									
									
									
									
									
									
									
									
	 
            ?>