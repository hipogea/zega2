<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alkardex-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmov'); ?>
		<?php echo $form->textField($model,'codmov',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codmov'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alemi'); ?>
		<?php echo $form->textField($model,'alemi',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'alemi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aldes'); ?>
		<?php echo $form->textField($model,'aldes',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'aldes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddoc'); ?>
		<?php echo $form->textField($model,'coddoc',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numdoc'); ?>
		<?php echo $form->textField($model,'numdoc',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'numdoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'usuario'); ?>
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
		<?php echo $form->labelEx($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textField($model,'comentario',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php echo $form->textField($model,'codocuref',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codocuref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numdocref'); ?>
		<?php echo $form->textField($model,'numdocref',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'numdocref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefijo'); ?>
		<?php echo $form->textField($model,'prefijo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'prefijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechadoc'); ?>
		<?php echo $form->textField($model,'fechadoc'); ?>
		<?php echo $form->error($model,'fechadoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'correlativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numkardex'); ?>
		<?php echo $form->textField($model,'numkardex',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'numkardex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solicitante'); ?>
		<?php echo $form->textField($model,'solicitante',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'solicitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidvale'); ?>
		<?php echo $form->textField($model,'hidvale'); ?>
		<?php echo $form->error($model,'hidvale'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->