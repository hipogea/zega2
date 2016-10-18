   
	<div class="row">
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
	'nombrecampo'=>'ceco',
	'ordencampo'=>3,
	'controlador'=>'Dcajachica',
	'relaciones'=>$model->relations(),
	'tamano'=>6,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'fhdfjfgery',
                    
	)); ?>
		<?php echo $form->error($model,'ceco'); ?>
	</div>