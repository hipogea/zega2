<div class="row">	
<div  style="float: left; font-size:0.85em; width:720px; "> 
		<div style="float: left;  width:200px;  ">
						<div style="float: left;  width:200px;  border-width:0px;border-style:solid;border-color:#ccc;">
						   <?php echo $form->labelEx($model,'descripcion'); ?>
							<?php echo $form->textField($model,'descripcion',array('size'=>25,'maxlength'=>25)); ?>
							<?php echo $form->error($model,'descripcion'); ?>
							
							
							<!--  ESTPO ES PAR AAÑLMACENAR EL MUNERO ALEATORIO TEMPORAL Y MANTENERLO EN LE FOMRUALRIO APRA 
							  PARA LUEGONAL HACER LE UPDATE TOMARLOE NE CUENT AL ACTUALIZAR LOS DETALLES -->
							<?php echo $form->hiddenField($model,'numeroauxiliar',array('value'=>Yii::app()->session['numeropedido'],'border'=>0));	?>
							
							
							
							
							
						</div>
		</div>
		<div style="float: left;  width:200px; ">
   
			<div style="float: left; font-size:1em; font-weight:bolder; width:200px; margin:3px 3px 3px 3px;  ">
							<?php echo $form->labelEx($model,'fecha'); ?>
							<?php
									$this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecha',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

								?>					
							
								<?php echo $form->error($model,'fecha'); ?>
							
			</div>
        </div>
		<div style="float: left;  width:200px; ">
   
			<div style="float: left; font-size:1em; font-weight:bolder; width:200px; margin:3px 3px 3px 3px;  ">
				
					<?php echo $form->labelEx($model,'numero'); ?>
					<?php echo $form->textField($model,'numero',array('disabled'=>'disabled','backgroundcolor'=>'#ccc','size'=>14,'maxlength'=>14)); ?>
					<?php echo $form->error($model,'numero'); ?> 		
			</div>
        </div>
</div>
 
 	
<div  style="float: left; font-size:0.85em; width:720px; clear:right;"> 
		<div style="float: left;  width:200px;  ">
						<div style="float: left;  width:200px;  ">
									<?php echo $form->labelEx($model,'codcentro'); ?>
									<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
									echo $form->DropDownList($model,'codcentro',$datos, array('empty'=>'--Seleccione un centro --')  )
									?>
									<?php echo $form->error($model,'codcentro'); ?>
						</div>
		</div>
		<div style="float: left;  width:200px; ">
   
			<div style="float: left; font-size:1em; font-weight:bolder; width:200px; margin:3px 3px 3px 3px;  ">
					<?php echo $form->labelEx($model,'codep'); ?>
						<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					$codigobarco=Yii::app()->user->getField('codep');
					echo ($codigobarco=='000')?$form->DropDownList($model,'codep',$datos, array('empty'=>'--Seleccione una Embarcacion --')  ):(
					               $form->textField($model,'barquitos_nomep',array('disabled'=>'disabled','value'=>Embarcaciones::model()->findByPk($codigobarco)->nomep))." ".
								   $form->hiddenField($model,'codep',array('value'=>$codigobarco)))
								  ;
							?>
							<?php echo $form->error($model,'codep'); ?>		
							
			</div>
        </div>
		
		
		<?php  // echo $form->textField($model,'numero',array('value'=>Yii::app()->user->getField('username'),'size'=>14,'maxlength'=>14)); ?>
					
		
		
		
		<div style="float: left;  width:200px;">
   
			<div style="float: left; font-size:1em; font-weight:bolder; width:200px; margin:3px 3px 3px 3px;  ">
				
							
			</div>
        </div>
</div>
</div>