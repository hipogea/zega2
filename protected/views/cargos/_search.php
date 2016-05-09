<?php
/* @var $this CargosController */
/* @var $model Cargos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codigocentro'); ?>
		<?php echo $form->textField($model,'codigocentro',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descargo'); ?>
		<?php echo $form->textField($model,'descargo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_cargo'); ?>
		<?php echo $form->textArea($model,'m_cargo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codjefe'); ?>
		<?php echo $form->textField($model,'codjefe',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codentrega'); ?>
		<?php echo $form->textField($model,'codentrega',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codrecibe'); ?>
		<?php echo $form->textField($model,'codrecibe',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecdocumento'); ?>
		<?php echo $form->textField($model,'fecdocumento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecentrega'); ?>
		<?php echo $form->textField($model,'fecentrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codtipocargo'); ?>
		<?php echo $form->textField($model,'codtipocargo',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoestadocargo'); ?>
		<?php echo $form->textField($model,'codigoestadocargo',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnumcargo'); ?>
		<?php echo $form->textField($model,'cnumcargo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coddocucargo'); ?>
		<?php echo $form->textField($model,'coddocucargo',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">


	</div>

	<div class="row">
		<?php echo $form->label($model,'creadoel'); ?>
		<?php echo $form->textField($model,'creadoel',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadoel'); ?>
		<?php echo $form->textField($model,'modificadoel',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modificadopor'); ?>

	</div>

	<div class="row">
		<?php echo $form->label($model,'idcargo'); ?>
		<?php echo $form->textField($model,'idcargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avisarvencimiento'); ?>
		<?php echo $form->textField($model,'avisarvencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechavencimiento'); ?>
		<?php echo $form->textField($model,'fechavencimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esalmacen'); ?>
		<?php echo $form->textField($model,'esalmacen'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->