<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/_div.css"); ?>

 
     <div class="row">
		<?php echo $form->labelEx($model,'panga_rpm'); ?>
		<?php echo $form->textField($model,'panga_rpm'); ?>
		<?php echo $form->error($model,'panga_rpm'); ?>
	 </div>
			<div class="row">
		<?php echo $form->labelEx($model,'panga_taguamot'); ?>
		<?php echo $form->textField($model,'panga_taguamot'); ?>
		<?php echo $form->error($model,'panga_taguamot'); ?>
		</div>
		 <div class="row">
		<?php echo $form->labelEx($model,'panga_paceitemotor'); ?>
		<?php echo $form->textField($model,'panga_paceitemotor'); ?>
		<?php echo $form->error($model,'panga_paceitemotor'); ?>
		</div>
		 <div class="row">
		<?php echo $form->labelEx($model,'panga_paceitecaja'); ?>
		<?php echo $form->textField($model,'panga_paceitecaja'); ?>
		<?php echo $form->error($model,'panga_paceitecaja'); ?>
		</div>

	  