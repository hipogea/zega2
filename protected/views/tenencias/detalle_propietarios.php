<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docingresados-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        // 'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>false,
	
)); ?>

				
		<?php  echo $form->errorSummary($model); ?>		
	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(		
					'nombrecampo'=>'codtra',
					'ordencampo'=>1,
					'controlador'=>$this->id,
					'relaciones'=>$model->relations(),
					'tamano'=>4,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'cocix',
					)

								);
		?>
            <?php echo $form->error($model,'codtra'); ?>
	</div>
    
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
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
