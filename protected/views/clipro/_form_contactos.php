<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	

	<div class="row">
	
		<?php 
		if($model->isNewRecord )
		    {
													
												echo $form->hiddenField($model,'c_hcod',array('size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
													//echo "el contacto es : ".$codpro;
												} else  {
													
												echo $form->textField($model,'c_hcod',array('disabled'=>'disabled','size'=>6,'maxlength'=>6,'value'=>$codpro)); 	
												}
			
			
			?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_nombre'); ?>
		<?php echo $form->textField($model,'c_nombre',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_cargo'); ?>
		<?php echo $form->textField($model,'c_cargo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_tel'); ?>
		<?php echo $form->textField($model,'c_tel',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_mail'); ?>
		<?php echo $form->textField($model,'c_mail',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'c_mail'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'fecnacimiento'); ?>
		<?php
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecnacimiento',
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
	</div>
	


	

	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>