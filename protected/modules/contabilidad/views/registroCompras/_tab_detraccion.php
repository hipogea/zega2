              <fieldset>
                <legend>Detraccion </legend>  
                
                <div class="row">
                        <?php echo $form->labelEx($model,'numconstdetraccion'); ?>
			<?php echo $form->textField($model,'numconstdetraccion',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'numconstdetraccion'); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'fechaemidetra'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fechaemidetra',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'yy-mm-dd',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'fechaemidetra'); ?>
                </div>
     
                
           </fieldset> 