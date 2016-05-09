<?php
/* @var $this CargosController */
/* @var $model Cargos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargos-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
			<?php
		    	 $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
				echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro --'));

			?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrepunto'); ?>
		<?php echo $form->textField($model,'nombrepunto',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombrepunto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxhorasespera'); ?>
		<?php echo $form->textField($model,'maxhorasespera',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'maxhorasespera'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'pesaje'); ?>
		<?php echo $form->checkBox($model,'pesaje'); ?>
		<?php echo $form->error($model,'pesaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hcodcanal'); ?>
		<?php
		$datos = CHtml::listData(Canales::model()->findAll(array('order'=>'canal')),'codcanal','canal');
		echo $form->DropDownList($model,'hcodcanal',$datos, array('empty'=>'--Llene el canal --'));

		?>
		<?php echo $form->error($model,'hcodcanal'); ?>
	</div>


	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>


