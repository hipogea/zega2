


<div class="row">
		<?php
		echo $form->labelEx($model,'numdocref'); ?>

		<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
			'nombrecampo'=>'numdocref',
			'controlador'=>$controlador,
			'tamano'=>12,
			'model'=>$model,
			'nombreclase'=>$nombreclase,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',

		));
		?>
		
		
		<?php echo $form->error($model,'numdocref'); ?>
	</div>
	
	
