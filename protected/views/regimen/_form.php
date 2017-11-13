<?php
/* @var $this RegimenController */
/* @var $model Regimen */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="division">
        <div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'regimen-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

        
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'desregimen'); ?>
		<?php echo $form->textField($model,'desregimen',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'desregimen'); ?>
	</div>

               <div class="row">
		<?php echo $form->labelEx($model,'hinicio');
                 
                    $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
                                'model'=>$model,
                         'attribute'=>'hinicio',
     // additional javascript options for the date picker plugin
                                'options'=>array(
                        'showPeriod'=>false,
                            ),
                    'htmlOptions'=>array('size'=>5,'maxlength'=>5,'disabled'=>($model->escampohabilitado('hinicio'))?'':'disabled' ),
                                ));
                        ?>
               
		<?php //echo $form->textField($model,'horacierre',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'hinicio'); ?>
	</div>
            
	<div class="row">
		<?php //echo $form->labelEx($model,'dias'); ?>
                <?php 
                /*$datos=array(
                       '5.0'=>'Monday to Friday',
                     '6.0'=>'Monday to Saturday',
                     '7.0'=>'Every Day',
                        );*/
                ?>
            
		<?php //echo $form->DropDownList($model,'dias',$datos, array('empty'=>'--Choose Schedule--')); ?>
		<?php //echo $form->error($model,'dias'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'turno'); ?>
                <?php 
                $datos=array(
                       'D'=>'DAY',
                     'N'=>'NIGHT',
                     //'7.0'=>'Todos los días',
                        );
                ?>
            
		<?php echo $form->DropDownList($model,'turno',$datos, array('empty'=>'--Choose Type Shift--','disabled'=>($model->escampohabilitado('hinicio'))?'':'disabled')); ?>
		<?php echo $form->error($model,'turno'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'horasdia'); ?>
		<?php echo $form->textField($model,'horasdia',array('disabled'=>($model->escampohabilitado('hinicio'))?'':'disabled')); ?>
		<?php echo $form->error($model,'horasdia'); ?>
	</div>

	
	

	
	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->checkBox($model,'activo');?>
            <?php echo $form->error($model,'activo');?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>5,'cols'=>75)); ?>
		
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
    </div>