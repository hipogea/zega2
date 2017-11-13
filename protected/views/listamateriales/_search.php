<?php
/* @var $this ListamaterialesController */
/* @var $model Listamateriales */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		<?php echo $form->label($model,'nombrelista'); ?>
		<?php echo $form->textField($model,'nombrelista',array('size'=>60,'maxlength'=>60)); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php

                        $datos = CHtml::listData(Tipolista::model()->findAll(array('order'=>'destipo')),'codtipo','destipo');
    echo $form->DropDownList($model,'codtipo',$datos, array('empty'=>'--Llene el tipo--'));


		?>
		<?php echo $form->error($model,'codtipo'); ?>

	</div>



	<div class="row">
		<?php echo $form->label($model,'compartida'); ?>
		<?php //echo $form->CheckBox($model,'compartida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->