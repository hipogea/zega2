<?php
/* @var $this CliproController */
/* @var $model Clipro */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'c_hcod'); ?>
		<?php echo $form->textField($model,'c_hcod',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'despro'); ?>
		<?php echo $form->textField($model,'despro',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	

<?php $this->endWidget(); ?>

</div><!-- search-form -->