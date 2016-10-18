   <?php // var_dump($model);die(); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'hidref'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
	'nombrecampo'=>'hidref',
	'ordencampo'=>6,
	'controlador'=>'Dcajachica',
	'relaciones'=>$model->relations(),
	'tamano'=>2,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'fhdfjv56fgery',
	)); ?>
		<?php echo $form->error($model,'ceco'); ?>
	</div>