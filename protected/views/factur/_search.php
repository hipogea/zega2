<?php
/* @var $this FacturController */
/* @var $model Factur */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codproadqui'); ?>
		<?php echo $form->textField($model,'codproadqui',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaemision'); ?>
		<?php echo $form->textField($model,'fechaemision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'versionubl'); ?>
		<?php echo $form->textField($model,'versionubl',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'versionestruc'); ?>
		<?php echo $form->textField($model,'versionestruc',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaconsumo'); ?>
		<?php echo $form->textField($model,'fechaconsumo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipodocumento'); ?>
		<?php echo $form->textField($model,'tipodocumento',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orcli'); ?>
		<?php echo $form->textField($model,'orcli',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codtipofac'); ?>
		<?php echo $form->textField($model,'codtipofac',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codsociedad'); ?>
		<?php echo $form->textField($model,'codsociedad',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codgrupoventas'); ?>
		<?php echo $form->textField($model,'codgrupoventas',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordenventa'); ?>
		<?php echo $form->textField($model,'ordenventa',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codobjeto'); ?>
		<?php echo $form->textField($model,'codobjeto',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechapresentacion'); ?>
		<?php echo $form->textField($model,'fechapresentacion',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechanominal'); ?>
		<?php echo $form->textField($model,'fechanominal',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechacancelacion'); ?>
		<?php echo $form->textField($model,'fechacancelacion',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenorsup'); ?>
		<?php echo $form->textField($model,'tenorsup',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tenorinf'); ?>
		<?php echo $form->textField($model,'tenorinf',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerocheque'); ?>
		<?php echo $form->textField($model,'numerocheque',array('size'=>24,'maxlength'=>24)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firmadigital'); ?>
		<?php echo $form->textArea($model,'firmadigital',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipodocadqui'); ?>
		<?php echo $form->textField($model,'tipodocadqui',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codleyenda'); ?>
		<?php echo $form->textField($model,'codleyenda',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->