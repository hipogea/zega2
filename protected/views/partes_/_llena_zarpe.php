	
	
	<div  style="float: left; width:700px; border :1px;"> 
					<div style="float: left; width:350px;">
						   <?php echo $form->labelEx($model,'zarpo'); ?>
							<?php echo $form->radioButtonList($model,'zarpo',array('SI'=>'SI','NO'=>'NO'),array(
							'labelOptions'=>array('style'=>'display:inline'), 'separator'=>'',)); ?>
					</div>
					<div style="float: left; clear:right; width:350px;">
						<?php echo $form->labelEx($model,'causa'); ?>
						<?php  $datos = array('P' => 'Pesca','T'=> 'Travesia','A'=> 'Apoyo','M' => 'Mantenimiento', 'R'=> 'Red/Lavado de red','O'=> 'Otro');
							echo $form->DropDownList($model,'causa',$datos, array('empty'=>'--Seleccione un motivo--')  )  ;	?>
						<?php echo $form->error($model,'causa'); ?>
	
					</div>
	</div>
	
	
	<div  style="float: left; width:700px; border :1px;"> 
					<div style="float: left; width:350px;">
							<?php echo $form->labelEx($model,'puerto'); ?>
							<?php  $datos = CHtml::listData(Plantas::model()->findAll(),'codplanta','desplanta');
								echo $form->DropDownList($model,'puerto',$datos, array('empty'=>'--Seleccione una Planta--')  )  ;
									?>
									<?php echo $form->error($model,'puerto'); ?> 
					</div>
					<div style="float: left; clear:right; width:350px;">
							<?php echo $form->labelEx($model,'puertodes'); ?>
								<?php  $datos = CHtml::listData(Plantas::model()->findAll(),'codplanta','desplanta');
										echo $form->DropDownList($model,'puertodes',$datos, array('empty'=>'--Seleccione una Planta--')  )  ;
										?>
								<?php echo $form->error($model,'puertodes'); ?>
	 
					</div>
	</div>	
	
	
	 <div  style="float: left; width:700px; border :1px;"> 
					<div style="float: left; width:350px;">
							<?php echo $form->labelEx($model,'fechazarpe'); ?>
	    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'fechazarpe', //attribute name
					'language'=>'es',
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array('dateFormat'=>'yy-mm-dd',
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui',' ... '),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
								),
													'htmlOptions'=>array(
															'style'=>'width:150px;vertical-align:top',
															'readonly'=>'readonly',
															),				// jquery plugin options
				));
			?>
	<?php echo $form->error($model,'fechazarpe'); ?>
					</div>
					<div style="float: left; clear:right; width:350px;">
							<?php echo $form->labelEx($model,'fechaarribo'); ?>
	   <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'fechaarribo', //attribute name
					'language'=>'es',
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array('dateFormat'=>'yy-mm-dd',
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui',' ... '),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
								),
													'htmlOptions'=>array(
															'style'=>'width:150px;vertical-align:top',
															'readonly'=>'readonly',
															),				// jquery plugin options
				));
			?>
			
			
			
	<?php echo $form->error($model,'fechaarribo'); ?>
	 
					</div>
	</div>	
	 
	
		

	
  
  	
  
  
  
		<div  style="float: left; width:700px; border :1px;"> 
					<div style="float: left; width:250px;">
						<?php echo $form->labelEx($model,'horometro'); ?>
						<?php echo $form->textField($model,'horometro', array('size'=>5)); ?>
						<?php echo $form->error($model,'horometro'); ?>
	 
					</div>
					<div style="float: left; clear:right; width:350px;">
								<?php
									$matriz=$ptipo->getdata();
													$i=0;
												foreach ($matriz as $clave => $valor) {
	            
																			$imagen="relojito.jpg"; 
																			$ruta=Yii::app()->params['rutaimagenes'].$imagen;
																			echo CHtml::image($ruta,"",array('border'=>0,'width'=>30,'height'=>40));
																			echo CHtml::label($matriz[$i]['descripcion'],false,array('as'=>12));
																			echo CHtml::label("Ultima lectura de horometro : ".$matriz[$i]['horometro'],false,array('as'=>12));
																			$i=$i+1;
																			}
									?>
	
				</div>
		</div>		
		
  
  
	


	<div class="row">
		<?php echo $form->labelEx($model,'horometrodes'); ?>
		<?php echo $form->textField($model,'horometrodes', array('size'=>5)); ?>
		<?php echo $form->error($model,'horometrodes'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'numerodecalas'); ?>
		<?php echo $form->textField($model,'numerodecalas', array('size'=>2)); ?>
		<?php echo $form->error($model,'numerodecalas'); ?>
	</div>
	
