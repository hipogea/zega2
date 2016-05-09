<?php
/* @var $this CcController */
/* @var $model Cc */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cc-form',
	'enableAjaxValidation'=>false,
)); ?>

	
	<?php //echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php if($model->isNewRecord) { ?>
		<?php echo $form->labelEx($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('disabled'=>($model->tienegastos())?'disabled':'','size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'correlativo'); ?>
		<?php } else  { ?>
			<?php echo $form->labelEx($model,'codc'); ?>
			<?php echo $form->textField($model,'codc',array('disabled'=>'disabled','size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'codc'); ?>

		<?php } ?>

	</div>


	<div class="row">


		<?php echo $form->labelEx($model,'centro'); ?>
		<?php
		     $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
echo $form->DropDownList($model,'centro',$datos, array('empty'=>'--Llene el centro emisor--',));

		?>
		<?php echo $form->error($model,'centro'); ?>
		
	</div>


	<div class="row">


		<?php echo $form->labelEx($model,'codclase'); ?>
		<?php
		$datos = CHtml::listData(Clasecc::model()->findAll(array('order'=>'desclasecolector')),'codclasecolector','desclasecolector');
		echo $form->DropDownList($model,'codclase',$datos, array( 'ajax' => array('type' => 'POST',
			'url' => CController::createUrl('Cc/cargagruposclases'), //  la acción que va a cargar el segundo div
			'update' => '#Cc_codgrupo' // el div que se va a actualizar
		),'empty'=>'--Llene el grupo--',));

		?>
		<?php echo $form->error($model,'codclase'); ?>

	</div>




	<div class="row">


		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php
		$datos = CHtml::listData(Grupocc::model()->findAll(array('order'=>'desgrupo')),'codgrupo','desgrupo');
		echo $form->DropDownList($model,'codgrupo',$datos, array('empty'=>'--Llene el grupo--',));

		?>
		<?php echo $form->error($model,'codgrupo'); ?>

	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'desceco'); ?>
		<?php echo $form->textField($model,'desceco',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'desceco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'validodel'); ?>
		<?php 
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'validodel',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',

															),
															));

														
															
		?>		
		<?php echo $form->error($model,'validodel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'validoal'); ?>
		<?php 
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'validoal',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',

															),
															));

														
															
		?>		
		<?php echo $form->error($model,'validoal'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'explicacion'); ?>
		<?php echo $form->textArea($model,'explicacion',array('columns'=>200,'rows'=>10)); ?>
		<?php echo $form->error($model,'explicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semaforopresup'); ?>
		<?php echo $form->checkBox($model,'semaforopresup'); ?>
		<?php echo $form->error($model,'semaforopresup'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div><!-- form -->