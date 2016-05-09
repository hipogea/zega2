<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Solpe-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>TRUE ,
     ),
	'enableAjaxValidation'=>true,
	



)); ?>



<div class="row">
    <?php echo (isset($mensaje))?$mensaje:''; ?>
    <?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>12,'maxlength'=>12, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>






	


	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidguia',array('value'=>$idcabeza)):""; ?>
        <?php echo $model->getScenario(); ?>
		
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Grabar'); ?>
	</div>






<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>