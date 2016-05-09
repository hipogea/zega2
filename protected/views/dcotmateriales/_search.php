<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codart'); ?>
		<?php echo $form->textField($model,'codart',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disp'); ?>
		<?php echo $form->textField($model,'disp',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'punit'); ?>
		<?php echo $form->textField($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descri'); ?>
		<?php echo $form->textField($model,'descri',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">


	</div>

	<div class="row">
		<?php echo $form->label($model,'creadoel'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadopor'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadoel'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoitem'); ?>
		<?php echo $form->textField($model,'tipoitem',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadodetalle'); ?>
		<?php echo $form->textField($model,'estadodetalle',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'um'); ?>
		<?php echo $form->textField($model,'um',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidguia'); ?>
		<?php echo $form->textField($model,'hidguia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codservicio'); ?>
		<?php echo $form->textField($model,'codservicio',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->