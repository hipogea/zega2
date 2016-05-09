<?php
/* @var $this ReportepescaController */
/* @var $model Reportepesca */
/* @var $form CActiveForm */
?>


	<div class="form">
	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reportepesca-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>false,
	
)); ?>	

	<?php //echo $form->errorSummary($model); ?>


				
				
			<div  style="float: left; width:600px ;"> 
					<div style="float: left; width:300px;">				
							<?php echo $form->labelEx($model,'fecha'); ?>
							<?php echo $form->textField($model,'fecha',array('disabled'=>'disabled')); ?>
							<?php echo $form->error($model,'fecha'); ?>
					</div>		
					<div style="float: left; width:300px;  clear:right;"> 			
							<?php echo $form->labelEx($model,'codep'); ?>
							<?php echo $form->textField($model,'codep',array('disabled'=>'disabled','size'=>3,'maxlength'=>3)); ?>
							<?php echo CHtml::textField('',$model->embarcacion->nomep,array('disabled'=>'disabled','size'=>23,'maxlength'=>23)); ?>
							<?php echo $form->error($model,'codep'); ?>				
					</div>		
			</div>
		
			<div  style="float: left; width:600px; "> 
					<div style="float: left; width:300px;"> 
						<?php echo $form->labelEx($model,'semana'); ?>
						<?php echo $form->textField($model,'semana',array('disabled'=>'disabled')); ?>
						<?php echo $form->error($model,'semana'); ?>				
					</div>
					<div style="float: left; width:300px;  clear:right;"> 
						<?php echo $form->labelEx($model,'codzarpe'); ?>
						<?php  $datos = CHtml::listData(Tipozarpe::model()->findAll(),'codtipo','motivozarpe');
						echo $form->DropDownList($model,'codzarpe',$datos, array('empty'=>'--Seleccione un tipo de salida--')  )  ;
						 ?>		
						<?php //echo $form->textField($model,'codzarpe',array('size'=>2,'maxlength'=>2)); ?>
						<?php echo $form->error($model,'codzarpe'); ?>				
				
					</div>		
			</div>			
	

			<div  style="float: left; width:600px; "> 
				<div style="float: left; width:300px;"> 	
						<?php echo $form->labelEx($model,'idespecie'); ?>
						<?php  $datos = CHtml::listData(Especie::model()->findAll(),'id','nomespecie');?>
						<?php    echo $form->DropDownList($model,'idespecie',$datos, array('empty'=>'--Seleccione una Especie--')  )  ;	?>
						<?php echo $form->error($model,'fecha'); ?>	
				</div>
				<div style="float: left; width:300px;  clear:right;"> 	
					<?php echo $form->labelEx($model,'d2'); ?>
					<?php echo $form->textField($model,'d2'); ?>
					<?php echo $form->error($model,'d2'); ?>			
				</div>		
		 </div>
		 
		<div  style="float: left; width:600px; "> 
				<div style="float: left; width:300px;"> 	
					<?php echo $form->labelEx($model,'codplantazarpe'); ?>
					<?php  $datos = CHtml::listData(Plantas::model()->findAll(),'codplanta','desplanta');
						echo $form->DropDownList($model,'codplantazarpe',$datos, array('empty'=>'--Seleccione una Planta--')  )  ;
					?>
					<?php echo $form->error($model,'codplantazarpe'); ?>
				</div>
				<div style="float: left; width:300px;  clear:right;"> 
					<?php echo $form->labelEx($model,'codplantadestino'); ?>
					<?php  $datos = CHtml::listData(Plantas::model()->findAll(),'codplanta','desplanta');
					echo $form->DropDownList($model,'codplantadestino',$datos, array('empty'=>'--Seleccione una Planta--')  )  ;
						?>		
					<?php echo $form->error($model,'codplantadestino'); ?>	
				</div>		
		</div>		
	
	
	
	
			<div  style="float: left; width:600px; "> 
					<div style="float: left; width:300px;"> 
						<?php echo $form->labelEx($model,'declarada'); ?>
						<?php echo $form->textField($model,'declarada'); ?>
						<?php echo $form->error($model,'declarada'); ?>
					</div>
					<div style="float: left; width:300px;  clear:right;"> 
						<?php echo $form->labelEx($model,'descargada'); ?>
						<?php echo $form->textField($model,'descargada'); ?>
						<?php echo $form->error($model,'descargada'); ?>
					</div>		
			</div>		

	

		
			<div  style="float: left; width:600px; "> 
					<div style="float: left; width:300px;">
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
					<div style="float: left; width:300px;  clear:right;"> 
						 <?php echo $form->labelEx($model,'fechaarribo'); ?>
	   <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'fechaarribo', //attribute name
					'language'=>'es',
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array( 'dateFormat'=>'yy-mm-dd',
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui',' ... '),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
								),
													'htmlOptions'=>array(
															'style'=>'width:150px;vertical-align:top',
															//'readonly'=>'readonly',
															),				// jquery plugin options
				));
			?>
			
			
			
	<?php echo $form->error($model,'fechaarribo'); ?>
							
						
					</div>		
			</div>		

	<div  style="float: left; width:600px; clear:right; "> 
					<div style="float: left; width:300px;"> 
						<?php echo $form->labelEx($model,'latitud'); ?>
						<?php echo $form->textField($model,'latitud'); ?>
						<?php echo $form->error($model,'latitud'); ?>
					</div>
					<div style="float: left; width:300px;  clear:right;"> 
						<?php echo $form->labelEx($model,'meridiano'); ?>
						<?php echo $form->textField($model,'meridiano'); ?>
						<?php echo $form->error($model,'meridiano'); ?>
					</div>		
			</div>		

		
	 <div class="row"> 	
	
		<?php echo $form->labelEx($model,'comenatrio'); ?>
		<?php echo $form->textarea($model,'comenatrio',array('cols'=>80,'rows'=>5)); ?>
		<?php echo $form->error($model,'comenatrio'); ?>
	</div>	
	
   <div class="row buttons">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Grabar'); ?>
	</div>	

<?php $this->endWidget(); ?>
</div>
