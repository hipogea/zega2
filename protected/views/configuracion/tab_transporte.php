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

<div class="row">
	<?php echo $form->labelEx($model,'transporte_objinterno') ?>
	<?php echo $form->checkbox($model,'transporte_objinterno'); ?>
	<?php echo $form->error($model,'transporte_objinterno'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'transporte_rutafotos') ?>
	<?php echo $form->textField($model,'transporte_rutafotos',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'transporte_rutafotos'); ?>
</div>

<div class="row">
		<?php echo $form->labelEx($model,'transporte_motivoot'); ?>
		<?php $datos=CHTml::listdata(Paraqueva::model()->FindAll(array("order"=>"motivo ASC")),'cmotivo','motivo'); ?>

		<?php echo $form->DropdownList($model,'transporte_motivoot',$datos,array('empty'=>'--Seleccione movimiento--')); ?>
		<?php echo $form->error($model,'transporte_motivoot'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'transporte_umdefault'); ?>
		<?php $datos=CHTml::listdata(Ums::model()->FindAll(array("order"=>"desum ASC")),'um','desum'); ?>

		<?php echo $form->DropdownList($model,'transporte_umdefault',$datos,array('empty'=>'--Seleccione um--')); ?>
		<?php echo $form->error($model,'transporte_umdefault'); ?>
	</div>