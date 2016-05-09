<?php
/* @var $this AlmacenmovimientosController */
/* @var $model Almacenmovimientos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacenmovimientos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codmov'); ?>
		<?php echo $form->textField($model,'codmov',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'codmov'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'anticodmov'); ?>
		<?php echo $form->textField($model,'anticodmov',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'anticodmov'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'verifconversionmoneda'); ?>
		<?php echo $form->checkBox($model,'verifconversionmoneda');?>
		<?php echo $form->error($model,'verifconversionmoneda'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'movimiento'); ?>
		<?php echo $form->textField($model,'movimiento',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'movimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'signo'); ?>
		<?php echo $form->textField($model,'signo'); ?>
		<?php echo $form->error($model,'signo'); ?>
	</div>


  <div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>

			<?php 
					$datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'codocu',$datos, array(
		                                               'empty'=>'--Seleccione un documento--',
													  
																		
																) ) ;
		?>

<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idevento'); ?>

		<?php
		$datos = CHtml::listData(Eventos::model()->findAll("codocu='101'"),'id','descripcion');
		echo $form->DropDownList($model,'idevento',$datos, array(
			'empty'=>'--Seleccione un evento--',


		) ) ;
		?>

		<?php echo $form->error($model,'idevento'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'codigo_objeto'); ?>
		<?php echo $form->textField($model,'codigo_objeto',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codigo_objeto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingreso'); ?>
		<?php echo $form->checkBox($model,'ingreso');?>
		<?php echo $form->error($model,'ingreso'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'escontable'); ?>
		<?php echo $form->checkBox($model,'escontable');?>
		<?php echo $form->error($model,'escontable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actualizaprecio'); ?>
		<?php echo $form->checkBox($model,'actualizaprecio');?>
		<?php echo $form->error($model,'actualizaprecio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'permcodcondicion'); ?>
		<?php echo $form->checkBox($model,'permcodcondicion');?>
		<?php echo $form->error($model,'permcodcondicion'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'permiteparciales'); ?>
		<?php echo $form->checkBox($model,'permiteparciales');?>
		<?php echo $form->error($model,'permiteparciales'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campoafectadoinv'); ?>
		<?php echo $form->textField($model,'campoafectadoinv');?>
		<?php echo $form->error($model,'campoafectadoinv'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'campodestino'); ?>
		<?php echo $form->textField($model,'campodestino');?>
		<?php echo $form->error($model,'campodestino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'permitereversiones'); ?>
		<?php echo $form->checkBox($model,'permitereversiones');?>
		<?php echo $form->error($model,'permitereversiones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esconsumo'); ?>
		<?php echo $form->checkBox($model,'esconsumo');?>
		<?php echo $form->error($model,'esconsumo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'itemsdeterministicos'); ?>
		<?php echo $form->checkBox($model,'itemsdeterministicos');?>
		<?php echo $form->error($model,'itemsdeterministicos'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'borraritems'); ?>
		<?php echo $form->checkBox($model,'borraritems');?>
		<?php echo $form->error($model,'borraritems'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'editarcantidad'); ?>
		<?php echo $form->checkBox($model,'editarcantidad');?>
		<?php echo $form->error($model,'editarcantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'esreal'); ?>
		<?php echo $form->checkBox($model,'esreal');?>
		<?php echo $form->error($model,'esreal'); ?>
	</div>











	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->