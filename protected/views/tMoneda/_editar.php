<?php
/* @var $this TMonedaController */
/* @var $model TMoneda */
/* @var $form CActiveForm */
?>

<?php MiFactoria::titulo("Monedas ","package"); ?>
<div class="division">
<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmoneda-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codmoneda'); ?>
		<?php echo $form->textField($model,'codmoneda',array('size'=>3,'disabled'=>'disabled')); ?>
		<?php echo $form->textField($model,'desmon',array('size'=>23,'disabled'=>'disabled')); ?>
		
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'habilitado'); ?>
		<?php echo $form->checkBox($model,'habilitado',ARRAY("disabled"=>($model->habilitado=='1')?"disabled":"")); ?>
                    <?php // echo $form->error($model,'general_codigomanualempresa'); ?>
	</div>
    
             <?php if(!is_null($modelocambio)){  ?>
                 <div class="row">
		<?php echo $form->labelEx($modelocambio,'compra'); ?>
		<?php echo $form->textField($modelocambio,'compra',array('size'=>3,'disabled'=>'disabled')); ?>
		
	        </div>       
            <div class="row">
		<?php echo $form->labelEx($modelocambio,'venta'); ?>
		<?php echo $form->textField($modelocambio,'venta',array('size'=>3,'disabled'=>'disabled')); ?>
		
	        </div> 
                <div class="row">
		<?php echo $form->labelEx($modelocambio,'ultima'); ?>
		<?php echo $form->textField($modelocambio,'ultima',array('size'=>3,'disabled'=>'disabled')); ?>
		
	        </div>
                <div class="row">
		<?php echo $form->labelEx($modelocambio,'activa'); ?>
		<?php echo $form->checkBox($modelocambio,'activa'); ?>
                    <?php // echo $form->error($model,'general_codigomanualempresa'); ?>
	</div>
                    <div class="row">
		<?php echo $form->labelEx($modelocambio,'seguir'); ?>
		<?php echo $form->checkBox($modelocambio,'seguir'); ?>
                    <?php // echo $form->error($model,'general_codigomanualempresa'); ?>
	</div>
    
             <?php }  ?>
    
    
    
    
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>