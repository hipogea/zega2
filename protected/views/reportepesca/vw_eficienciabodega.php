
<div  style="float: left; width:900px;"> 
   <div style="float: left; width:500px;">
   
		
	
		<br>
		<ul>
		<li><b>Indicador de eficiencia de bodega:</b>
		  <br>
		   <br>
			<ul>
			Muestra toda la capacidad de bodega usada a la fecha, desde el inicio de temporada frente a la cantidad de pesca descargada acumulada
			
				<br>
				
			<ul>
			
		
			 <li>Por cada jornada de pesca se contabiliza la capacidad de bodega de la embarcacion (Bodega disponible) </li>
			 <li>No se toman en cuenta jornadas donde la embarcacion, no realiza faenas de captura (Travesias, remolques etc.)</li>
				
			<ul>
		</li>




  </div>
		<div style="float: left; clear:right; width:400px;">
		 <?php
					//$this->renderpartial('gauge',array('dato'=>$globalito));
					
				?>
																	
		
		
	</div>
  </div>  
	<div style="float: left; width:900px;">
   


<?php 
	$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
							'chart'=>array(
											'type'=>'column',
								        ),
							 'title'=>array(
							         'text'=>'Eficiencia de bodega',
								),	

								'xAxis'=> ARRAY(
								  //'categories'=>ARRAY('Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas'),
									'categories'=>$barcos,
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
														'text'=> 'Total de bodega disponible (TN)',
													),
								     
										'stackLabels'=>array(
															'enabled'=> true,
															'style'=>array(
																			'fontWeight'=> 'bold',
																			'color'=> 'gray',
																			
																			),
															
															 ),
									),

					'legend'=> array(
								'align'=>'right',
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
								   ({point.percentage}%)<br/>',
                                'shared'=> true,
								'valueDecimals'=>2,
								
								
								//'formatter'=>' function() {
												///return "<b>"+ this.x +"</b><br/>"+
											///	this.series.name +": "+ this.y +"<br/>"+
												//	"Total: "+ this.point.stackTotal;
												//}',
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
							'name'=>'Remanente',
							'data'=>$bodega,
							'color'=>'#FFB13D', 

								) , 
					array(
							'name'=> 'Usada(Pesca acumulada)',
							'data'=>$descargada,
							'color'=>'#666699',
							),
					
								
								),
			)
			)
			);
			
			
		//echo json_encode($descargada); 		
			
	?>	

	</div>
 	