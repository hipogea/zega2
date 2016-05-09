<?php
/* @var $this FacturController */
/* @var $model Factur */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'factur-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codproadqui'); ?>
		<?php echo $form->textField($model,'codproadqui',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'codproadqui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaemision'); ?>
		<?php echo $form->textField($model,'fechaemision'); ?>
		<?php echo $form->error($model,'fechaemision'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'versionubl'); ?>
		<?php echo $form->textField($model,'versionubl',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'versionubl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'versionestruc'); ?>
		<?php echo $form->textField($model,'versionestruc',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'versionestruc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaconsumo'); ?>
		<?php echo $form->textField($model,'fechaconsumo'); ?>
		<?php echo $form->error($model,'fechaconsumo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipodocumento'); ?>
		<?php echo $form->textField($model,'tipodocumento',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'tipodocumento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orcli'); ?>
		<?php echo $form->textField($model,'orcli',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'orcli'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento'); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipofac'); ?>
		<?php echo $form->textField($model,'codtipofac',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codtipofac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codsociedad'); ?>
		<?php echo $form->textField($model,'codsociedad',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'codsociedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupoventas'); ?>
		<?php echo $form->textField($model,'codgrupoventas',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codgrupoventas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordenventa'); ?>
		<?php echo $form->textField($model,'ordenventa',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'ordenventa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codobjeto'); ?>
		<?php echo $form->textField($model,'codobjeto',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codobjeto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechapresentacion'); ?>
		<?php echo $form->textField($model,'fechapresentacion',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'fechapresentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechanominal'); ?>
		<?php echo $form->textField($model,'fechanominal',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'fechanominal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechacancelacion'); ?>
		<?php echo $form->textField($model,'fechacancelacion',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'fechacancelacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenorsup'); ?>
		<?php echo $form->textField($model,'tenorsup',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tenorsup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenorinf'); ?>
		<?php echo $form->textField($model,'tenorinf',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tenorinf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerocheque'); ?>
		<?php echo $form->textField($model,'numerocheque',array('size'=>24,'maxlength'=>24)); ?>
		<?php echo $form->error($model,'numerocheque'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firmadigital'); ?>
		<?php echo $form->textArea($model,'firmadigital',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'firmadigital'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipodocadqui'); ?>
		<?php echo $form->textField($model,'tipodocadqui',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'tipodocadqui'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codleyenda'); ?>
		<?php echo $form->textField($model,'codleyenda',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'codleyenda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
