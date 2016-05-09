

<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */




$this->menu=array(
	
	array('label'=>'Crear Temporada', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->idtemporada)),
	//array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Crear Parte', 'url'=>array('/reportepesca/crearparte','idtemporada'=>$model->idtemporada)),
	array('label'=>'Ver eficiencia de bodegas', 'url'=>array('/reportepesca/eficiencia','idtemporada'=>$model->idtemporada)),
	array('label'=>'Ver temporadas', 'url'=>array('admin')),
);
?>

		<div  style="float: left; width:800px;"> 
			<div style="float: left;  width:400px;">	
					
											<?php $this->widget('zii.widgets.CDetailView', array(
															'data'=>$model,
															'attributes'=>array(
	 //	'id',
															'destemporada',
																'nomespecie',
																'inicio',
																'termino',
																'cuota_anchoveta',
																'sdeclarada',
																'sdescargada',
																'sd2',
																'sct',
																'sfd',
																'bodega',
															'eficienciabodega',
															'd2porhora',
															'cumplimiento',
																	),
													)); 
											?>	
					</div>
   
   
		
  
		<div style="float: left; clear:right; width:300px;">	
			<?php  
						/*$proveedor = VwReportepescaTemporada::model()->search_por_temporada($model->id);
		
														$matriz=$proveedor->getdata();
													$i=0;
															//$presionesmotor=array();
															//$presionescaja=array();
														
																	foreach ($matriz as $clave => $valor) {
																			$cumplimiento[$i]=$matriz[$i]['cumplimiento']	;
																			//$presionescaja[$i]=$matriz[$i]['caja_paceite']	;
																				$i=$i+1;
																					}
																					//  $resto=100-$cumplimiento[0];
																					//}else {
																					//  $resto=0;
																					///
																					//}
					        if(isset($cumplimiento[0])) {
							 $resto=100-$cumplimiento[0];
							 } else {
							  $resto=0;
							 }*/
							 

  


	
					
					
				$this->Widget('ext.highcharts.HighchartsWidget', array(
												'options'=>array(
     
														'chart'=>array(
																'plotBackgroundColor'=> null,
																	'plotBorderWidth'=> null,
																'plotShadow'=> false
																		),
																	'title'=>array('text'=>'Cumplimiento cuota',),
																				'plotOptions'=>array(
																				'pie'=>array(
																				'allowPointSelect'=> true,
																				'cursor'=> 'pointer',
																				'dataLabels'=>array(
																				'enabled'=> true,
																					'color'=>'#000000',
																				'connectorColor'=> '#000000',
																				'formatter'=> 'function() {
																					return " "+ this.percentage +" % ";
																								}' 
																	),
																	),
																),
            

																'series'=> array( 
																					array( 
																						'type'=> 'pie',
						//'name'=> 'Porcentaje cumplimiento',
																							'data'=> array( 
								//array('Cuotarrrrrrr asignada',  1),								//array('IE',       26.8),								
																										array('Pendiente', 34),
																										array('Capturado',66),
								//array('ert',100),
							//	array('Ckyuououuota asignada',80.9),
								//array('Cuota asignada',9),
								//array('Opera',     100),
								//array('Others',   0.7),
																							)
																									),
																		),

	
																			)
										));
			
		


/*
	$anchovetapro=VwRppescaAnchoveta::model()->search_por_temporada($model->id);
	$anchoveta=$anchovetapro->getdata();
	$fechas=array()	;
	$pescas=array();
	$acumulado=array();
	$meta=array();
	$i=0;
    foreach ($anchoveta as $clave => $valor) {
								$fechas[$i]=substr($anchoveta[$i]['fecha'],5,5)	;
								$pescas[$i]=$anchoveta[$i]['sdescargada']+0	;
								if ($i==0) {
								      $acumulado[$i]=$pescas[$i];
								}else {
								   $acumulado[$i]=$acumulado[$i-1]+$pescas[$i];
								}
								 $meta[$i]=800000;
								
								//$presionescaja[$i]=$matriz[$i]['caja_paceite']	;
								$i=$i+1;
						}
						
						
	$jurel=VwRppescaJurel::model()->search_por_temporada($model->id)->getdata();
	//$anchoveta=$anchovetapro->getdata();
	//$fechas=array()	;
	$pescasjurel=array();
	$acumuladojurel=array();
	$metajurel=array();
	$i=0;
    foreach ($jurel as $clave => $valor) {
								//$fechas[$i]=substr($anchoveta[$i]['fecha'],5,5)	;
								$pescasjurel[$i]=$jurel[$i]['sdescargada']+0	;
								if ($i==0) {
								      $acumuladojurel[$i]=$pescasjurel[$i];
								}else {
								   $acumuladojurel[$i]=$acumuladojurel[$i-1]+$pescasjurel[$i];
								}
								 $meta[$i]=40000;
								
								//$presionescaja[$i]=$matriz[$i]['caja_paceite']	;
								$i=$i+1;
						}
						
	//echo json_encode($fechas);
	//echo json_encode($pescas);
	//echo json_encode($acumulado);
	//print_r($pescas);
	//print_r($acumulado);*/
	
	
	
	/*
	

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
						//array('name'=>'metajurel','data'=>$metajurel),
						array('name'=>'Jurel','data'=>$acumuladojurel),
						//array('name'=>'Anchoveta','data'=>array(106, 107, 111, 133, 221, 767, 1766)),
						//array('name'=>'oceania','data'=>array(18, 31, 54, 156, 339, 818, 1201)),
	  
						)
			)
	  )
    );	 
	 
	 
	*/ 
	 
?>  

	
 



			
				
			

          
	</div>


  </div>	
  

  
  
  
  
			<div style="float: left; width:700px;">		
			
			
             <?php 
				  
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
						//array('name'=>'metajurel','data'=>$metajurel),
						//array('name'=>'Jurel','data'=>$acumuladojurel),
						//array('name'=>'Anchoveta','data'=>array(106, 107, 111, 133, 221, 767, 1766)),
						//array('name'=>'oceania','data'=>array(18, 31, 54, 156, 339, 818, 1201)),
	  
						)
			)
	  )
    );	 
	 
            ?>
			  </div> 
			<div style="float: left; width:700px;">	
           <?php // $this->renderPartial('vw_resumentemporadatotal', array('model'=>$model));
			   $this->renderPartial('vw_resumentemporada', array('model'=>$model,));
           ?>
			</div> 