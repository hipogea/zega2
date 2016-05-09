<?php
/* @var $this MaestroAtributosController */
/* @var $model MaestroAtributos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestro-atributos-form',
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>true,
	
)); ?>

	

	

	
	    <div class="row">
		<?php echo $form->labelEx($model,'hid'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'hid',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'relaciones'=>$model->relations(),
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'cocolocox',
												'defol'=>'',
													)
													
								);
								
			   ?>
	</div>
	
	<div style='float: left;'>
					<?php echo $form->error($model,'hid'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'nombreat'); ?>
		<?php echo $form->textField($model,'nombreat',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombreat'); ?>
	</div>
	


	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'padre'); ?>
		<?php echo $form->textField($model,'padre'); ?>
		<?php echo $form->error($model,'padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jerarquia'); ?>
		<?php echo $form->textField($model,'jerarquia'); ?>
		<?php echo $form->error($model,'jerarquia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo'); ?>
		<?php echo $form->textField($model,'respaldo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'respaldo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo2'); ?>
		<?php echo $form->textField($model,'respaldo2',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'respaldo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'respaldo3'); ?>
		<?php echo $form->textField($model,'respaldo3',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'respaldo3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textArea($model,'texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tieneum'); ?>
		<?php echo $form->textField($model,'tieneum',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tieneum'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>