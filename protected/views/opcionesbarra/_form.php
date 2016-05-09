<?php
/* @var $this OpcionesbarraController */
/* @var $model Opcionesbarra */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opcionesbarra-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx($model,'idope'); ?>
	<?php  $datos1 = CHtml::listData(Operacionesbarra::model()->findAll(),'id','nameop');
	echo $form->DropDownList($model,'idope',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
	?>
	<?php echo $form->error($model,'idope'); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php if(!isset($this->controladorpadre)) { ?>

		<?php  $datos2 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		echo $form->DropDownList($model,'codocu',$datos2, array('ajax' => array(
			'type' => 'POST',
			'url' => CController::createUrl('Site/cargaestado'), //  la acción que va a cargar el segundo div
			'update' => '#Opcionesbarra_codestado' // el div que se va a actualizar
		),
			'prompt' => 'Seleccione un documento' // Valor por defecto


		) ) ;
		?>
		<?php } else { ?>
			<?php echo CHtml::TextField('fggf',$model->documnetos->desdocu); ?>
		<?php } ?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php  $datos3 = CHtml::listData(Estado::model()->findAll(),'codestado','estado');
		echo $form->DropDownList($model,'codestado',$datos3, array('empty'=>'--Seleccione un Estado--'  ) ) ;
		?>
		<?php echo $form->error($model,'codestado'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php  echo $form->TextField($model,'action',array('size'=>'50'  )) ;
		?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dialog'); ?>
		<?php  echo $form->TextField($model,'dialog',array('size'=>'50'  )) ;
		?>
		<?php echo $form->error($model,'dialog'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'frame'); ?>
		<?php  echo $form->TextField($model,'frame',array('size'=>'50'  )) ;
		?>
		<?php echo $form->error($model,'frame'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->CheckBox($model,'activo',array('maxLenght'=>50,'maxlength'=>1,'size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>


</div>
</div>

</div><!-- form -->