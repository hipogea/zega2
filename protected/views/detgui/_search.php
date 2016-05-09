<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'n_hguia'); ?>
		<?php echo $form->textField($model,'n_hguia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_itguia'); ?>
		<?php echo $form->textField($model,'c_itguia',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_cangui'); ?>
		<?php echo $form->textField($model,'n_cangui'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_codgui'); ?>
		<?php echo $form->textField($model,'c_codgui',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_edgui'); ?>
		<?php echo $form->textField($model,'c_edgui',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_descri'); ?>
		<?php echo $form->textField($model,'c_descri',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_obs'); ?>
		<?php echo $form->textArea($model,'m_obs',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_um'); ?>
		<?php echo $form->textField($model,'c_um',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_codep'); ?>
		<?php echo $form->textField($model,'c_codep',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ndeenvio'); ?>
		<?php echo $form->textField($model,'ndeenvio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_detgui'); ?>
		<?php echo $form->textField($model,'n_detgui'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_libre'); ?>
		<?php echo $form->textField($model,'l_libre',array('size'=>1,'maxlength'=>1)); ?>
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
		<?php echo $form->label($model,'n_hconformidad'); ?>
		<?php echo $form->textField($model,'n_hconformidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_estado'); ?>
		<?php echo $form->textField($model,'c_estado',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_libre'); ?>
		<?php echo $form->textField($model,'n_libre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_idconformidad'); ?>
		<?php echo $form->textField($model,'n_idconformidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_af'); ?>
		<?php echo $form->textField($model,'c_af',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_codactivo'); ?>
		<?php echo $form->textField($model,'c_codactivo',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_img'); ?>
		<?php echo $form->textField($model,'c_img',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_codsap'); ?>
		<?php echo $form->textField($model,'c_codsap',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docref'); ?>
		<?php echo $form->textField($model,'docref',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'docrefext'); ?>
		<?php echo $form->textField($model,'docrefext',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidref'); ?>
		<?php echo $form->textField($model,'hidref'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codocu'); ?>
		<?php echo $form->textField($model,'codocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->