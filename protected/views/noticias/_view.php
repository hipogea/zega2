<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<div class="division">

	<div class="wide form">

		<?php

		$administra=$this->isAdminTablon();


		?>
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'noticias-form',
			'enableAjaxValidation'=>false,
		)); ?>




		<div class="row">

			<?php echo $form->labelEx($model,'tiponoticia'); ?>
			<?php  $datos = array('01' => 'Aviso','02'=> 'Onomastico','03'=> 'Efemeride');
			echo $form->DropDownList($model,'tiponoticia',$datos, array('empty'=>'--Seleccione un tipo--')  )  ;	?>
			<?php echo $form->error($model,'tiponoticia'); ?>

		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'txtnoticia'); ?>
			<?php echo $form->textArea($model,'txtnoticia',array('disabled'=>($administra)?'disabled':'','rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'txtnoticia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'fecha'); ?>
			<?php echo $form->textField($model,'fecha',array('disabled'=>($administra)?'disabled':'')); ?>
			<?php echo $form->error($model,'fecha'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'autor'); ?>
			<?php echo $form->textField($model,'autor',array('disabled'=>($administra)?'disabled':'')); ?>
			<?php echo $form->error($model,'autor'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'fechapropuesta'); ?>
			<?php echo $form->textField($model,'fechapropuesta',array('disabled'=>($administra)?'disabled':''));?>

		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'fexpira'); ?>
			<?php echo $form->textField($model,'fexpira',array('disabled'=>($administra)?'disabled':''));?>

		</div>


		<div class="row">
			<?php
				echo $form->labelEx($model,'aprobado');
				echo $form->checkBox($model,'aprobado',array('disabled'=>'disabled'));

			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'mensaje'); ?>
			<?php echo $form->textField($model,'mensaje',array('size'=>1,'maxlength'=>1,'disabled'=>($administra)?'disabled':'')); ?>



		<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>