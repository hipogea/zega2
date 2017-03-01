<?php MiFactoria::titulo("Liquidacion efectivo","basket");   ?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'devolucion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
        
     
                
                <div class="row">
                        <?php echo $form->labelEx($model,'monto'); ?>
			<?php echo $form->textField($model,'monto',array('value'=>$montosugerido,'size'=>8,'maxlength'=>100));
                               echo CHtml::openTag("span",array("class"=>"label badge-error")).yii::app()->settings->get('general','general_monedadef').CHtml::openTag("span");
                        ?>
			<?php echo $form->error($model,'monto'); ?>
                </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
			'model'=>$model,
			'attribute'=>'fecha',
			'language'=>Yii::app()->language=='es' ? 'es' : null,
			'options'=>array(
				'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
				'showOn'=>'button', // 'focus', 'button', 'both'
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'dd/mm/yy',
			),
			'htmlOptions'=>array(
				'style'=>'width:80px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Liquidar con efectivo' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>























