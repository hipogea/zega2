<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/css/_div.css"); ?>

 
     <div>
		<?php echo $form->labelEx($model,'acylu_consumomotor'); ?>
		<?php echo $form->textField($model,'acylu_consumomotor'); ?>
		<?php echo $form->error($model,'acylu_consumomotor'); ?>
	 </div>
			<div>
		<?php echo $form->labelEx($model,'acylu_consumocaja'); ?>
		<?php echo $form->textField($model,'acylu_consumocaja'); ?>
		<?php echo $form->error($model,'acylu_consumocaja'); ?>
		</div>
		 <div>
		<?php echo $form->labelEx($model,'acylu_consumohid'); ?>
		<?php echo $form->textField($model,'acylu_consumohid'); ?>
		<?php echo $form->error($model,'acylu_consumohid'); ?>
		</div>
		 <div>
		<?php echo $form->labelEx($model,'acylu_consumograsa'); ?>
		<?php echo $form->textField($model,'acylu_consumograsa'); ?>
		<?php echo $form->error($model,'acylu_consumograsa'); ?>
		</div>
		<div>
		<?php echo $form->labelEx($model,'acylu_observaciones'); ?>
		<?php echo $form->textArea($model,'acylu_observaciones', array('rows'=>7, 'columns'=>7)); ?>
		<?php echo $form->error($model,'acylu_observaciones'); ?>
		</div>
	  