     <div>
		
			<?php $this->widget('ext.kpi.KPi',array(
		
													'startAngle'=>-150,
													'endAngle'=>150,
													'min'=>0,
													'max'=>100,
													'step'=>2,
													'texto'=>'%',
													'ancholinea'=>0,
													'titulo'=>'Ef. bodega',
													'rangocolores'=>array(
																			array('from'=>70,'to'=>100,'color'=>'#55BF3B'),																			
																			array('from'=>50,'to'=>70,'color'=>'#DDDF0D'),
																			array('from'=>40,'to'=>50,'color'=>'#FFBF00'),
																			array('from'=>0,'to'=>40,'color'=>'#DF5353'),
																	),
													'valor'=>$dato+0,
													'sufix'=>'hola :',
													)
													
								);
								
			?>
															
	</div>