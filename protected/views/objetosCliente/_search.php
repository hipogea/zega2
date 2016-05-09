<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codpro'); ?>
		<?php echo $form->textField($model,'codpro',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codobjeto'); ?>
		<?php echo $form->textField($model,'codobjeto',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreobjeto'); ?>
		<?php echo $form->textField($model,'nombreobjeto',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionobjeto'); ?>
		<?php echo $form->textArea($model,'descripcionobjeto',array('rows'=>6, 'cols'=>50)); ?>
	</div>







	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div><!-- search-form -->