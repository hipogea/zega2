
<div class="row">
	<?php echo $form->labelEx($model,'inventario_periodocontrol'); ?>
	<?php echo $form->textField($model,'inventario_periodocontrol',array('size'=>3,'maxlength'=>3)); ?>
	<?php echo $form->error($model,'inventario_periodocontrol'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'inventario_mascaraubicaciones'); ?>
	<?php echo $form->textField($model,'inventario_mascaraubicaciones',array('size'=>100,'maxlength'=>100)); ?>
	<?php echo $form->error($model,'inventario_mascaraubicaciones'); ?>
</div>



<BR>