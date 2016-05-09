<?php
/* @var $this TenoresController */
/* @var $model Tenores */
/* @var $form CActiveForm */
?>


<div class="division">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tenores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'coddocu',$datos, array( 
									  'empty'=>'--Seleccione un documento--',) ) ;
		?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textArea($model,'mensaje',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mensaje'); ?>
	</div>

	<?php echo $form->labelEx($model,'sociedad'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'sociedad',$datos1, array('empty'=>'--Seleccione sociedad--' )  )  ;
		?>
		<?php echo $form->error($model,'sociedad'); ?>
	
	
	<div class="row">
		
		
		<?php echo $form->labelEx($model,'posicion'); ?>
						<?php  $alfabeto = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
								$datos=array_combine($alfabeto,$alfabeto);
							echo $form->DropDownList($model,'posicion',$datos, array('empty'=>'--Seleccione la posicion--')  )  ;	?>
						<?php echo $form->error($model,'posicion'); ?>
	</div>

	

	


	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo');?>
		<?php echo $form->error($model,'activo'); ?>
	</div>
	



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>