<div class="row">
		<?php echo $form->labelEx($model,'fechapresentacion'); ?>
		<?php if ($this->eseditable($model->codestado)=='')
		
		{
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechapresentacion',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

					 } else{
						echo $form->textField($model,'fechapresentacion',array('disabled'=>'disabled','size'=>10)) ;
				
								}										
															
		?>		
		<?php echo $form->error($model,'fechapresentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechanominal'); ?>
			<?php if ($this->eseditable($model->codestado)=='')
		
		{
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechanominal',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

					 } else{
						echo $form->textField($model,'fechanominal',array('disabled'=>'disabled','size'=>10)) ;
				
								}	

				   ?>

		<?php echo $form->error($model,'fechanominal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenorsup'); ?>
		<?php echo $form->textField($model,'tenorsup',array('size'=>2,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tenorsup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tenorinf'); ?>
		<?php echo $form->textField($model,'tenorinf',array('size'=>2,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tenorinf'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>