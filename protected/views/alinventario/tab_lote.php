	  <div class="row">
		<?php echo $form->labelEx($model,'numlote'); ?>
		<?php echo $form->textField($model,'numlote'); ?>
		<?php //echo $form->error($model,'numlote'); ?>
		  </div>

	  <div class="row">
		  <?php echo CHtml::label('Orden','Ordenee'); ?>
		  <?php echo CHtml::textField('sss',$model->getubicacion().'/'.$model->inventario->numerolotes,array('disabled'=>'disabled')); ?>
		  <?php //echo $form->error($model,'numlote'); ?>
	  </div>


	  <div class="row">

		  <div class="row">
			  <?php echo $form->labelEx($model,'fechafabri'); ?>
         <?php
		  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		  'model'=>$model,
		  'attribute'=>'fechafabri',
		  'language'=>Yii::app()->language=='es' ? 'es' : null,
		  'options'=>array(
		  'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
		  'showOn'=>'both', // 'focus', 'button', 'both'
		  'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
		  'buttonImageOnly'=>true,
		  'dateFormat'=>'yy-mm-dd',
		  ),
		  'htmlOptions'=>array(
		  'style'=>'width:120px;vertical-align:top',
		  'readonly'=>'readonly',
		  'size'=>12,
		  'disabled'=>false,
		  ),
		  ));
			  ?>

			  <?php echo $form->error($model,'fechafabri'); ?>

		  </div>
		  <div class="row">
			  <?php echo $form->labelEx($model,'fechavenc'); ?>
			  <?php
			  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				  'model'=>$model,
				  'attribute'=>'fechavenc',
				  'language'=>Yii::app()->language=='es' ? 'es' : null,
				  'options'=>array(
					  'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					  'showOn'=>'both', // 'focus', 'button', 'both'
					  'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					  'buttonImageOnly'=>true,
					  'dateFormat'=>'yy-mm-dd',
				  ),
				  'htmlOptions'=>array(
					  'style'=>'width:120px;vertical-align:top',
					  'readonly'=>'readonly',
					  'size'=>12,
					  'disabled'=>false,
				  ),
			  ));
			  ?>

			  <?php echo $form->error($model,'fechavenc'); ?>

		  </div>

		  <div class="row">
			  <?php echo $form->labelEx($model,'cant'); ?>
			  <?php echo $form->textField($model,'cant',array('disabled'=>'disabled')); ?>
			  <?php echo $form->error($model,'cant'); ?>
			  <div class="row">

				  <div class="row">
					  <?php echo $form->labelEx($model,'punit'); ?>
					  <?php echo $form->textField($model,'punit',array('disabled'=>'disabled')); ?>
					  <?php echo $form->error($model,'punit'); ?>
			  <div class="row">

				  <div class="row">
					  <?php echo $form->labelEx($model,'loteprov'); ?>
					  <?php echo $form->textField($model,'loteprov'); ?>
					  <?php echo $form->error($model,'loteprov'); ?>
					  <div class="row">


	
	<div class="row buttons">
		<?php CHtml::submitButton('Actualizar'); ?>
	</div>
