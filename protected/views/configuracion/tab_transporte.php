<div class="row">
	<?php echo $form->labelEx($model,'transporte_tiempopermitidohastaentrega'); ?>
	<?php echo $form->textField($model,'transporte_tiempopermitidohastaentrega',array('size'=>3,'maxlength'=>3)); ?>
	<?php echo $form->error($model,'transporte_tiempopermitidohastaentrega'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'transporte_trancheck') ?>
	<?php echo $form->checkbox($model,'transporte_trancheck'); ?>
	<?php echo $form->error($model,'transporte_trancheck'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model,'transporte_lugares') ?>
    <?php echo $form->checkbox($model,'transporte_lugares'); ?>
    <?php echo $form->error($model,'transporte_lugares'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'transporte_objenguia') ?>
	<?php echo $form->checkbox($model,'transporte_objenguia'); ?>
	<?php echo $form->error($model,'transporte_objenguia'); ?>
</div>
