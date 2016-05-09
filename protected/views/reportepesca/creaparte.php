<?php
/* @var $this TemporadasController */
/* @var $model Temporadas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'temporadas-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
       //  'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>true,
)); ?>


 <?php //$model->setScenario('escenarioparte'); ?>
	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'destemporada'); ?>
		<?php echo $form->textField($model,'destemporada',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'termino'); ?>
		<?php echo $form->textField($model,'termino',array('disabled'=>'disabled','size'=>60,'maxlength'=>60)); ?>
		
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'idespecie'); ?>
		<?php  $datos = CHtml::listData(Especie::model()->findAll(),'id','nomespecie');?>
		<?php    echo $form->DropDownList($model,'idespecie',$datos, array('empty'=>'--Seleccione una Especie--')  )  ;	?>
		<?php echo $form->error($model,'idespecie'); ?>
		
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'fechadehoy'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'fechadehoy',
				'language'=>'es',
				'value'=>$model->fechadehoy,
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',				
					)));
		?>
		<?php echo $form->error($model,'fechadehoy'); ?>
	
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton( 'Crear parte' ); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->