<?php
/* @var $this ClasesmaestroController */
/* @var $model Clasesmaestro */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codclasema'); ?>
		<?php echo $form->textField($model,'codclasema',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomclase'); ?>
		<?php echo $form->textField($model,'nomclase',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->