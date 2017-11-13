<?php
/* @var $this OperaPlanesController */
/* @var $model OperaPlanes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'opera-planes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
           	<?php echo $form->labelEx($model,'codep'); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codep',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>'',
													   'options'=>array()  ) ) ;
		?>
		<?php echo $form->error($model,'c_codep'); ?>
            
	</div>

	<div class="row">
           	<?php echo $form->labelEx($model,'codsistema'); ?>
		<?php  $datos1 = CHtml::listData(OperaSistemas::model()->findAll(array('order'=>'sistema')),'codsis','sistema');
		
		  echo $form->DropDownList($model,'codsistema',$datos1, array('empty'=>'--Seleccione un Sistema--',  'disabled'=>'',
													   'options'=>array()  ) ) ;
		?>
		<?php echo $form->error($model,'codsistema'); ?>
            
	</div>
        <div class="row">
           	<?php echo $form->labelEx($model,'tipo'); ?>
		<?php  $datos413 =array(
                    '100'=>'Lubricacion',
                    '200'=>'Recambio',
                    '300'=>'Limpieza',
                );
		  echo $form->DropDownList($model,'tipo',$datos413, array('empty'=>'--Seleccione un  tipo--',  
													   'options'=>array()  ) ) ;
		?>
		<?php echo $form->error($model,'tipo'); ?>
            
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'labor'); ?>
		<?php echo $form->textField($model,'labor',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'labor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frecuencia'); ?>
		<?php echo $form->textField($model,'frecuencia'); ?>
		<?php echo $form->error($model,'frecuencia'); ?>
	</div>

          <div class="row">
		<?php echo $form->labelEx($model,'codof'); ?>
                 <?php  $datos = CHtml::listData(Oficios::model()->findAll(array('order'=>'oficio')),'codof','oficio');
                    echo $form->DropDownList($model,'codof',$datos, array('empty'=>'--Seleccione un oficio --')  );
                    ?>
              <?php echo $form->error($model,'codof'); ?>
            </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->