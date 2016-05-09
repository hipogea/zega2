<?php
/* @var $this DesolpeController */
/* @var $model Desolpe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'desolpe-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posicion'); ?>
		<?php echo $form->textField($model,'posicion',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'posicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipimputacion'); ?>
		<?php echo $form->textField($model,'tipimputacion',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipimputacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php echo $form->textField($model,'centro',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'centro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txtmaterial'); ?>
		<?php echo $form->textField($model,'txtmaterial',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'txtmaterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupocompras'); ?>
		<?php echo $form->textField($model,'grupocompras',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'grupocompras'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modificado'); ?>
		<?php echo $form->textField($model,'modificado',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'modificado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textodetalle'); ?>
		<?php echo $form->textArea($model,'textodetalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textodetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacrea'); ?>
		<?php echo $form->textField($model,'fechacrea'); ?>
		<?php echo $form->error($model,'fechacrea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaent'); ?>
		<?php echo $form->textField($model,'fechaent'); ?>
		<?php echo $form->error($model,'fechaent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechalib'); ?>
		<?php echo $form->textField($model,'fechalib'); ?>
		<?php echo $form->error($model,'fechalib'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadolib'); ?>
		<?php echo $form->textField($model,'estadolib',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estadolib'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php echo $form->textField($model,'imputacion',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'imputacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solicitanet'); ?>
		<?php echo $form->textField($model,'solicitanet',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'solicitanet'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidsolpe'); ?>
		<?php echo $form->textField($model,'hidsolpe'); ?>
		<?php echo $form->error($model,'hidsolpe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creado'); ?>
		<?php echo $form->textField($model,'creado',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'creado'); ?>
	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">



	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->