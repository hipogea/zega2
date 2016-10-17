<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'hidcaja'); ?>
		<?php  $datos1 = CHtml::listData(Cajachica::model()->findAll(),'id','descripcion');
		echo $form->DropDownList($model,'hidcaja',$datos1, array('empty'=>'--Seleccione la caja--') ) ;
		?>
		<?php echo $form->error($model,'hidcaja'); ?>
	</div>

<div class="row">
		
		<?php  
		echo $form->hiddenField($model,'tipoflujo', array('value'=>'101') ) ;
		?>
    
                
		
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
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'glosa'); ?>
		<?php echo $form->textField($model,'glosa',ARRAY('size'=>40)); ?>
		<?php echo $form->error($model,'glosa'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',ARRAY('size'=>20)); ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debe'); ?>
		<?php echo $form->textField($model,'debe',ARRAY('size'=>8)); ?>
		<?php echo $form->error($model,'debe'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'monedahaber'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropdownList($model,'monedahaber',$datos,array('empty'=>'--Seleccione moneda--','disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'monedahaber'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo CHtml::textField('hsfjjfsj',"  ".yii::app()->params['monedabase']." - ".MiFactoria::decimal($model->monto),ARRAY('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'haber'); ?>
		<?php echo $form->textField($model,'haber',ARRAY('size'=>20)); ?>
		<?php echo $form->error($model,'haber'); ?>
	</div>




	

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos1 = CHtml::listData(Documentos::model()->findAll("comprobante='1'"),'coddocu','desdocu');
		echo $form->DropDownList($model,'codocu',$datos1, array('empty'=>'--Seleccione comprobante--') ) ;
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
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
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>