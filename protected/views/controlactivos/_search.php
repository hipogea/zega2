<?php
/* @var $this ControlActivosController */
/* @var $model ControlActivos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idactivo'); ?>
		<?php echo $form->textField($model,'idactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guiaremision'); ?>
		<?php echo $form->textField($model,'guiaremision',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numerofactura'); ?>
		<?php echo $form->textField($model,'numerofactura',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idemplazamientoactual'); ?>
		<?php echo $form->textField($model,'idemplazamientoactual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idemplazamientoanterior'); ?>
		<?php echo $form->textField($model,'idemplazamientoanterior'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codobraencurso'); ?>
		<?php echo $form->textField($model,'codobraencurso',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ccanterior'); ?>
		<?php echo $form->textField($model,'ccanterior',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ccactual'); ?>
		<?php echo $form->textField($model,'ccactual',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numformato'); ?>
		<?php echo $form->textField($model,'numformato',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idformato'); ?>
		<?php echo $form->textField($model,'idformato'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codestado'); ?>
		<?php echo $form->textField($model,'codestado',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'almacen'); ?>
		<?php echo $form->textField($model,'almacen',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valesalida'); ?>
		<?php echo $form->textField($model,'valesalida',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ocompra'); ?>
		<?php echo $form->textField($model,'ocompra',array('size'=>20,'maxlength'=>20)); ?>
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
		<?php echo $form->label($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codepanterior'); ?>
		<?php echo $form->textField($model,'codepanterior',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codep'); ?>
		<?php echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codlugaranterior'); ?>
		<?php echo $form->textField($model,'codlugaranterior',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codlugarnuevo'); ?>
		<?php echo $form->textField($model,'codlugarnuevo',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codcentro'); ?>
		<?php echo $form->textField($model,'codcentro',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante'); ?>
		<?php echo $form->textField($model,'solicitante',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documento'); ?>
		<?php echo $form->textField($model,'documento',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroref'); ?>
		<?php echo $form->textField($model,'numeroref',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->