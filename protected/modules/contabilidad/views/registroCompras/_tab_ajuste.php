
                <legend>Ajuste de precios </legend>  
                <div class="row">
                        <?php echo $form->labelEx($model,'reftipo'); ?>
			<?php echo $form->DropDownList($model,'reftipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			<?php echo $form->error($model,'reftipo'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'refserie'); ?>
			<?php echo $form->textField($model,'refserie',array('size'=>4,'maxlength'=>4)); ?>
			<?php echo $form->error($model,'refserie'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'refnumero'); ?>
			<?php echo $form->textField($model,'refnumero',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'refnumero'); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'reffechaorigen'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'reffechaorigen',
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
			<?php echo $form->error($model,'reffechaorigen'); ?>
                </div>
                 <div class="row">
                        <?php 
                        if(!$model->isNewRecord){
                        echo $form->labelEx($model,'fechacre'); ?>
			<?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'fechacre'); 
                        }
                        ?>
                </div>
                 
                
           </fieldset>     	
		
                
		
		
