<?php
/* @var $this AlconversionesController */
/* @var $model Alconversiones */
/* @var $form CActiveForm */
?>

<div class="form">
	<div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alconversiones-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php echo CHtml::textField('cadeae',$modelomaestro->codigo,array('disabled'=>'disabled'));
		echo $form->hiddenField($model,'codart',array('value'=>$modelomaestro->codigo));
		?>
		<?php echo $form->error($model,'codart'); ?>
	</div>
	<div style="width:200px;float:left; margin:2px;padding:5px; border-style: solid;border-width: 1px; border-color:#bbb; ">
		<?php echo "Valore Base "; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'numerador'); ?>
		<?php echo $form->textField($model,'numerador'); ?>
		<?php echo $form->error($model,'numerador'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'um1'); ?>
		<?php 
		  echo CHtml::textField('cadea',$modelomaestro->maestro_ums->desum,array('disabled'=>'disabled'));
		 echo $form->hiddenField($model,'um1',array('value'=>$modelomaestro->maestro_ums->um,)); 			     
 		?>
		<?php echo $form->error($model,'um1'); ?>
		</div>

</div>

	<div style="width:200px;float:left; clear:right;  margin:2px;padding:5px; border-style: solid;border-width: 1px; border-color:#bbb; ">
		<?php echo "Valor Convertido Equivalente "; ?>
		<div class="row">
		<?php echo $form->labelEx($model,'denominador'); ?>
		<?php echo $form->textField($model,'denominador'); ?>
		<?php echo $form->error($model,'denominador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um2'); ?>
		<?php 
			$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
				echo $form->DropDownList($model,'um2',$datos, array('empty'=>'--Unidad de medida--', )  )  ;						     
 		?>
		<?php echo $form->error($model,'um2'); ?>
		</div>


		</div>

	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
</div><!-- form -->