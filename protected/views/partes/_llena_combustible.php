<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/_div.css"); ?>

 
     <div class="row">
		<?php echo $form->labelEx($model,'d2_zarpe'); ?>
		<?php echo $form->textField($model,'d2_zarpe'); ?>
		<?php echo $form->error($model,'d2_zarpe'); ?>
	 </div>
			<div class="row">
		<?php echo $form->labelEx($model,'d2_arribo'); ?>
		<?php echo $form->textField($model,'d2_arribo'); ?>
		<?php echo $form->error($model,'d2_arribo'); ?>
		</div>
		 
		 	<div class="row">
		<?php echo $form->labelEx($model,'consumocombustible'); ?>
		<?php echo $form->textField($model,'consumocombustible',array('disabled'=>'disabled','size'=>4)); ?>
		<?php //echo $form->error($model,'d2_arribo'); ?>
		</div>
		 
		 	<div class="row">
		<?php echo $form->labelEx($model,'consumoporhora'); ?>
		<?php echo $form->textField($model,'consumoporhora',array('disabled'=>'disabled','size'=>4)); ?>
		<?php //echo $form->error($model,'d2_arribo'); ?>
		</div>
		 
		
		 <div class="row">
		<?php echo $form->labelEx($model,'d2_observaciones'); ?>
		<?php echo $form->textArea($model,'d2_observaciones'); ?>
		<?php echo $form->error($model,'d2_observaciones'); ?>
		</div>

	  