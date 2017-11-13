<div class="division">
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventario-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
)); ?>   
	<?php echo $form->errorSummary($model);
        //print_r($model->attributes);
        ?>
      <p class="note">Los campos marcados con asterisco( <span class="required">*</span>)  son obligatorios.</p>
      
			<?php 
			// esl estado es '01' POR DEFAULT '
			echo $form->hiddenField($model,'hidinventario'); ?>
	 <div class="row">
			<?php echo $form->labelEx($model,'finicio'); 
			
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'finicio',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
						//'readonly'=>'readonly',
					),
				));
			
			?>
			<?php echo $form->error($model,'finicio'); ?>
		
         </div>
      <div class="row">
           <?php
      $this->widget(
    'booster.widgets.TbEditableField',
    array(
        'type' => 'text',
        'model' => $model,
        'attribute' => 'finicio', // $model->name will be editable
        'url' => '', //url for submit data
    )
);
     ?> 
      </div>
<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'comentario',
                                    'htmlOptions'=>array('rows'=>25,'cols'=>50),
                                )
                            );?>
              <?php echo $form->error($model,'comentario'); ?>
	</div>
<div class="row">
                    <?php echo $form->labelEx($model,'numero'); ?>
		<?php 	
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"numero",
                        'source'=>Yii::app()->createUrl('request/suggestotsimple'),
                        'options'=>array(
				'showAnim'=>'fold',),
                            
                         'htmlOptions'=>array(
                                   
                                            'size'=>'10',
                                              //'disabled'=>($model->escampohabilitado('codcompo'))?'':'disabled',
                                                    ),   
                             		));?>
                  
                   <?php echo $form->error($model,'numero'); ?>
		</div>  
      
      <div class="row">
		<?php echo $form->labelEx($model,'condescanso'); ?>
		<?php echo $form->checkBox($model,'condescanso');?>
		<?php //echo $form->error($model,'tienecarter'); ?>
	</div>	
	 <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Modificar'); ?>
	</div>
	
<?php $this->endWidget(); ?>
 </div>
</div>
