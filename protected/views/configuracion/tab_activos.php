
<div class="row">
	<?php echo $form->labelEx($model,'af_afmascara'); ?>
	<?php echo $form->textField($model,'af_afmascara',array('size'=>80,'maxlength'=>80)); ?>
	<?php echo $form->error($model,'af_afmascara'); ?>
</div>


<div class="row">
	<?php echo $form->labelEx($model,'af_rutafotosinventario').'  '. yii::app()->getBaseUrl(false); ?>
	<?php echo $form->textField($model,'af_rutafotosinventario',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'af_rutafotosinventario'); ?>
</div>



