<?php
/* @var $this CmotivoController */
/* @var $model CMotivo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codmotivo'); ?>
		<?php echo $form->textField($model,'codmotivo',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desmotivo'); ?>
		<?php echo $form->textField($model,'desmotivo',array('size'=>35,'maxlength'=>35)); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->