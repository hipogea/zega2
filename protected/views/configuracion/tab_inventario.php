
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
<div class="row">
	<?php echo $form->labelEx($model,'inventario_bloqueado'); ?>
	<?php echo $form->checkBox($model,'inventario_bloqueado'); ?>

</div>

<div class="row">
	<?php echo $form->labelEx($model,'inventario_auto'); ?>
	<?php echo $form->checkBox($model,'inventario_auto'); ?>

</div>



<BR>