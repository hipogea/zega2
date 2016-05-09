
		<?php $this->widget('ext.egauge.EGauge',array(
		
													'start'=>0,
													'end'=>100,
													'value'=>$dato,
													'count'=>11,
													'rStart'=>-210,
													'rEnd'=>-160,
													)
													
								);
								echo "hola";
								
			?>
			<?php echo "hola"; ?>
			<?php $this->widget('ext.kpi.KPi',array(
		
													'startAngle'=>-150,
													'endAngle'=>150,
													'min'=>0,
													'max'=>100,
													'step'=>2,
													'texto'=>'Avance (%)',
													'rangocolores'=>array(
																			array('from'=>0,'to'=>20,'color'=>'#55BF3B'),
																			array('from'=>20,'to'=>80,'color'=>'#DDDF0D'),
																			array('from'=>80,'to'=>100,'color'=>'#DF5353'),
																	),
													'valor'=>82,
													'sufix'=>'hola :',
													)
													
								);
								
			?>
															
	