<?php
/* @var $this CoordreporteController */
/* @var $model Coordreporte */
/* @var $form CActiveForm */
?>
<div class="wide form">
<div class="division">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coordreporte-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'longitudcampo'); ?>
		<?php echo $form->textField($model,'longitudcampo',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'longitudcampo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre_campo'); ?>
		<?php echo $form->textField($model,'nombre_campo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre_campo'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'left_'); ?>
		<?php echo $form->textField($model,'left_',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'left_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'top'); ?>
		<?php echo $form->textField($model,'top',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'top'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_size'); ?>
		<?php echo $form->textField($model,'font_size',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'font_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_family'); ?>
		<?php echo $form->textField($model,'font_family',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'font_family'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_weight'); ?>
		<?php echo $form->textField($model,'font_weight',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'font_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_color'); ?>
		<?php echo $form->textField($model,'font_color',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'font_color'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'aliascampo'); ?>
		<?php echo $form->textField($model,'aliascampo',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'aliascampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_left'); ?>
		<?php echo $form->textField($model,'lbl_left',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lbl_left'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_top'); ?>
		<?php echo $form->textField($model,'lbl_top',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lbl_top'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_font_size'); ?>
		<?php echo $form->textField($model,'lbl_font_size',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lbl_font_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_font_weight'); ?>
		<?php echo $form->textField($model,'lbl_font_weight',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lbl_font_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_font_family'); ?>
		<?php echo $form->textField($model,'lbl_font_family',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'lbl_font_family'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lbl_font_color'); ?>
		<?php echo $form->textField($model,'lbl_font_color',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'lbl_font_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visiblelabel'); ?>
			<?php echo $form->checkBox($model,'visiblelabel'); ?>
		<?php echo $form->error($model,'visiblelabel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visiblecampo'); ?>
		<?php echo $form->checkBox($model,'visiblecampo'); ?>
		<?php echo $form->error($model,'visiblecampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esdetalle'); ?>
		<?php echo $form->textField($model,'esdetalle'); ?>
		<?php echo $form->error($model,'esdetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalizable'); ?>
		<?php echo $form->checkBox($model,'totalizable'); ?>
		<?php echo $form->error($model,'totalizable'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'esnumerico'); ?>
		<?php echo $form->checkBox($model,'esnumerico'); ?>
		<?php echo $form->error($model,'esnumerico'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adosaren'); ?>
		<?php echo $form->textField($model,'adosaren',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'adosaren'); ?>

	</div>







	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div></div>