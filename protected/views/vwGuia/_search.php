<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */
/* @var $form CActiveForm */
?>
<div class='division_'>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),	
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
	'method'=>'GET',
)); ?>
		
		
			<div class='division_1'>
				<div style="float: left; ">
			        <?php echo $form->labelEx($model,'cod_cen'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');
					echo $form->DropDownList($model,'cod_cen',$datos, array('empty'=>'--Seleccione un centro --')  )
					?>
				</div>	
				<div class="row">
					<?php echo $form->label($model,'c_descri'); ?>
					<?php echo $form->textField($model,'c_descri',array('size'=>30,'maxlength'=>30)); ?>
				</div>

				<div class="row">
					<?php // echo $form->label($model,'c_serie'); ?>
					<?php //echo $form->textField($model,'c_serie',array('size'=>4,'maxlength'=>4)); ?>
				</div>

	
				<div class="row">
					<?php echo $form->label($model,'c_numgui'); ?>
					<?php echo $form->textField($model,'c_numgui',array('size'=>12,'maxlength'=>12)); ?>
				</div>
	
				<div class="row">
					<?php echo $form->label($model,'razondestinatario'); ?>
					<?php echo $form->textField($model,'razondestinatario',array('size'=>25,'maxlength'=>14)); ?>
				</div>

			</div>

			<div class='division_2'>
					<div class="row">
						<?php echo $form->label($model,'c_codactivo'); ?>
						<?php echo $form->textField($model,'c_codactivo',array('size'=>14,'maxlength'=>14)); ?>
					</div>
					
					<div class="row">
						<?php echo $form->label($model,'estadodetalle'); ?>
						<?php echo $form->textField($model,'estadodetalle',array('size'=>14,'maxlength'=>14)); ?>
					</div>
	
	
					<div class="row">
						<?php echo $form->labelEx($model,'d_fectra'); ?>
		
						<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 										array(
												 'model'=>$model,
 												'attribute'=>'d_fectra',
												 'value'=>$model->d_fectra,
 												'language' => 'es',
												 'htmlOptions' => array('readonly'=>"readonly"),
												 'options'=>array(
 												'autoSize'=>true,
 												'defaultDate'=>$model->d_fectra,
 												'dateFormat'=>'yy-mm-dd',
 												'showAnim'=>'fold',
												 'selectOtherMonths'=>true,
 													'showAnim'=>'slide',
 													'showButtonPanel'=>true,
 													'showOn'=>'button',
													 'showOtherMonths'=>true,
													 'changeMonth' => 'true',
 													'changeYear' => 'true',
													 ),
 														)
							);?>
		
					</div>
					<div class="row">
							<?php echo $form->labelEx($model,'d_fectra1'); ?>
		
		
											<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 														array(
 													'model'=>$model,
 													'attribute'=>'d_fectra1',
 													'value'=>$model->d_fectra1,
													 'language' => 'es',
 														'htmlOptions' => array('readonly'=>"readonly"),
 														'options'=>array(
 														'autoSize'=>true,
														 'defaultDate'=>$model->d_fectra1,
 															'dateFormat'=>'yy-mm-dd',
															 'showAnim'=>'fold',
 
 															'selectOtherMonths'=>true,
 															'showAnim'=>'slide',
															 'showButtonPanel'=>true,
 																			'showOn'=>'button',
																 'showOtherMonths'=>true,
 																'changeMonth' => 'true',
 																			'changeYear' => 'true',
 																		),
 																		)
											);?>
		
					</div>
					<div style="float: left; ">
			        		<?php echo $form->labelEx($model,'c_codep'); ?>
							<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
							echo $form->DropDownList($model,'c_codep',$datos, array('empty'=>'--Seleccione un Objeto --')  )
							?>
					</div>
	
	
	
					<div class="row buttons">
								<?php echo CHtml::submitButton('Buscar'); ?>
					</div>


			</div>
			<?php $this->endWidget(); ?>

		</div>




</div>