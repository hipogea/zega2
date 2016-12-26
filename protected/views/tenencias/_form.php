<?php
/* @var $this TenenciasController */
/* @var $model Tenencias */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="wide-form">
        <div class="division">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tenencias-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codte'); ?>
		<?php echo $form->textField($model,'codte',array('size'=>4,'maxlength'=>4,'disabled'=>(!$model->isNewRecord)?'disabled':'')); ?>
		<?php echo $form->error($model,'codte'); ?>
	</div>

        
        <div class="row">
		<?php // echo $form->labelEx($model,'codocu'); ?>
		<?php // $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		 // echo //$form->DropDownList($model,'codocu',$datos, array('disabled'=>(!$model->isNewRecord)?'disabled':'',
									//  'empty'=>'--Seleccione un documento--',) ) ;
		?>
		<?php  //echo $form->error($model,'codocu'); ?>
	</div>
        
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'deste'); ?>
		<?php echo $form->textField($model,'deste',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'deste'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro--',
                'options'=>array(
		 isset(Yii::app()->session['codcentro'])?Yii::app()->session['codcentro']:''=>array('selected'=>true)
		)  ));
					?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

        
        <div class="row">
		<?php echo $form->labelEx($model,'alerta'); ?>
		<?php echo $form->checkBox($model,'alerta'); ?>
		<?php //echo $form->error($model,'horaspreviasalerta'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'horaspreviasalerta'); ?>
		<?php echo $form->textField($model,'horaspreviasalerta',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'horaspreviasalerta'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'horasfrecuencialerta'); ?>
		<?php echo $form->textField($model,'horasfrecuencialerta',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'horasfrecuencialerta'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'listamail'); ?>
		<?php echo $form->textField($model,'listamail',array('size'=>90,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'listamail'); ?>
	</div>
        
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
    </div>