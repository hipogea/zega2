


 
	<div  
	style="
	float: left; 
	font-size:0.85em;
	padding:15px;
	clear:right; 
	width:410px;
	border-width:1px;
	border-style:solid;
	border-color:#ccc;
	"> 
 
				
				<div
						style="
						float: left; 
						font-family: verdana, tahoma, arial, sans-serif;
						font-size:1.2em;
						clear:right; 
						width:400px;
						padding-left:20px;
						border-bottom-width:1px;
						border-bottom-style:dotted;
						border-color:#ccc;
							"
				>
							
								<?php ECHO $asunto; ?>
							<br>
				 </div>
				 				<div
						style="
						float: left; 
						font-family: verdana, tahoma, arial, sans-serif;
						font-size:0.8em;
						color :#0B3B0B;
						font-weight:bolder
						padding:20px;
						clear:right; 
						width:400px;
						padding-left:20px;						
						border-color:#ccc;
						"
							>
							  <br>
								Autor : <?php // echo Yii::app()->user->getField('apaterno')." ".Yii::app()->user->getField('amaterno')." ".Yii::app()->user->getField('nombres')." " ;?>
									<br>
							</div>
				 
				 
				 
				 
				 
				 
							 <div
						style="
						float: left; 
						font-family: verdana, tahoma, arial, sans-serif;
						font-size:1.0em;						
						padding-left :3px;
						clear:right; 
						width:400px;
						border-width:0px;
						background-color:#F4FA58;
							"
							>
								<br>
								<?php echo $contenido; ?>
								<br>
							
							</div>
							<div
						style="
						float: left; 
						font-family: verdana, tahoma, arial, sans-serif;
						font-size:0.9em;						
						padding-left :180px;
						clear:right; 						
						width:400px;
						border-width:0px;
						
							"
							>
								
								<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$modelito,
								'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'styles.css',
								'attributes'=>$campos
								 )); ?>
								<br>
								<br>
						</div>
						
				 
				 
				  <div
						style="
						float: left; 
						font-family: verdana, tahoma, arial, sans-serif;
						font-size:0.9em;
						color:#ccc;
						padding-left :180px;
						clear:right; 						
						width:400px;
						border-width:0px;
						
							"
					>

							<br>
							 Este correo se gener&oacute; autom&aacute;ticamente, si ya no desea recibir este correo,
							 favor de responder con el mismo asunto y su direccion ser&aacute; retirada de la lista 
 
				 </div>
				 
				 
				 
 </div>
 
 
 