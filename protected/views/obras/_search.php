<?php
/* @var $this ObrasController */
/* @var $model Obras */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'descriobra'); ?>
		<?php echo $form->textField($model,'descriobra',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oi'); ?>
		<?php echo $form->textField($model,'oi',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idinventario'); ?>
		<?php echo $form->textField($model,'idinventario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechasol'); ?>
		<?php echo $form->textField($model,'fechasol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechacierre'); ?>
		<?php echo $form->textField($model,'fechacierre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc'); ?>
		<?php echo $form->textField($model,'cc',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'om'); ?>
		<?php echo $form->textField($model,'om',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obs'); ?>
		<?php echo $form->textArea($model,'obs',array('rows'=>6, 'cols'=>50)); ?>
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
		<?php echo $form->label($model,'centro'); ?>
		<?php echo $form->textField($model,'centro',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prefijo'); ?>
		<?php echo $form->textField($model,'prefijo',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idobra'); ?>
		<?php echo $form->textField($model,'idobra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->