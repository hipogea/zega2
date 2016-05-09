<?php
/* @var $this ArchivadorController */
/* @var $model Archivador */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(" coddocupadre in ('999','000') "),'coddocu','desdocu');
					echo $form->DropDownList($model,'codocu',$datos, array('empty'=>'--Seleccione un clase --')  )
		?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desarchivo'); ?>
		<?php echo $form->textField($model,'desarchivo',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obsarchivo'); ?>
		<?php echo $form->textArea($model,'obsarchivo',array('rows'=>2, 'cols'=>50)); ?>
	</div>

	
	<div class="row">
		<?php echo $form->label($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso'); ?>
		<?php echo $form->textField($model,'peso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>
<br>
