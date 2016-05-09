<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo $form->hiddenField($model,'n_hguia',array('value'=>$idcabeza)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_itguia'); ?>
		<?php echo $form->textField($model,'c_itguia',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'c_itguia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_cangui'); ?>
		<?php echo $form->textField($model,'n_cangui'); ?>
		<?php echo $form->error($model,'n_cangui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_codgui'); ?>
		<?php echo $form->textField($model,'c_codgui',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'c_codgui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_edgui'); ?>
		<?php echo $form->textField($model,'c_edgui',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'c_edgui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_descri'); ?>
		<?php echo $form->textField($model,'c_descri',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'c_descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_obs'); ?>
		<?php echo $form->textArea($model,'m_obs',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'m_obs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_um'); ?>
		<?php echo $form->textField($model,'c_um',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'c_um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_codep'); ?>
		<?php echo $form->textField($model,'c_codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'c_codep'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ndeenvio'); ?>
		<?php echo $form->textField($model,'ndeenvio'); ?>
		<?php echo $form->error($model,'ndeenvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_libre'); ?>
		<?php echo $form->textField($model,'l_libre',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'l_libre'); ?>
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
		<?php echo $form->labelEx($model,'n_hconformidad'); ?>
		<?php echo $form->textField($model,'n_hconformidad'); ?>
		<?php echo $form->error($model,'n_hconformidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_estado'); ?>
		<?php echo $form->textField($model,'c_estado',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'c_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_libre'); ?>
		<?php echo $form->textField($model,'n_libre'); ?>
		<?php echo $form->error($model,'n_libre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_idconformidad'); ?>
		<?php echo $form->textField($model,'n_idconformidad'); ?>
		<?php echo $form->error($model,'n_idconformidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_af'); ?>
		<?php echo $form->textField($model,'c_af',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'c_af'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_codactivo'); ?>
		<?php echo $form->textField($model,'c_codactivo',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'c_codactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_img'); ?>
		<?php echo $form->textField($model,'c_img',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'c_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_codsap'); ?>
		<?php echo $form->textField($model,'c_codsap',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'c_codsap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'docref'); ?>
		<?php echo $form->textField($model,'docref',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'docref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'docrefext'); ?>
		<?php echo $form->textField($model,'docrefext',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'docrefext'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidref'); ?>
		<?php echo $form->textField($model,'hidref'); ?>
		<?php echo $form->error($model,'hidref'); ?>
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