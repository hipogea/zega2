<div class="row">
	<?php echo $form->labelEx($model,'materiales_rutaimagenesmateriales').'  '. yii::app()->getBaseUrl(false); ?>
	<?php echo $form->textField($model,'materiales_rutaimagenesmateriales',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'materiales_rutaimagenesmateriales'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'materiales_codigoservicio'); ?>
	<?php echo $form->textField($model,'materiales_codigoservicio',array('size'=>12,'maxlength'=>12)); ?>
	<?php echo $form->error($model,'materiales_codigoservicio'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'materiales_contabilidad') ?>
	<?php echo $form->checkbox($model,'materiales_contabilidad'); ?>
	<?php echo $form->error($model,'materiales_contabilidad'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'materiales_verpresolpe') ?>
	<?php echo $form->checkbox($model,'materiales_verpresolpe'); ?>
	<?php echo $form->error($model,'materiales_verpresolpe'); ?>
</div>


<BR>