


<?php 
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
        'htmlOptions' => array('class' => 'well'), // for inset effect
    )
);
?>

    <?php
    
    $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'Efectuar',
        'context' => 'success',
        'context' => 'success',
        'htmlOptions'=>array('type'=>'input')
    )
); echo ' ';
$this->widget(
        'booster.widgets.TbButton',
        array(
            'label' => 'Cerrar',
            'context' => 'danger',
            'htmlOptions'=>array('onClick'=>" function() {
        $(this).dialog('close');
    }")
    )
        
); echo ' ';

    ?>
<?php echo $form->errorSummary($model); ?>

  
    <?php      
                            echo $form->hiddenField($model,'hidplan');    
                            ?>
<div class="row">
		<?php echo $form->labelEx($model,'fechaejec'); ?>
		 <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'fechaejec', //attribute name
					'language'=>'es',
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array('dateFormat'=>'yy-mm-dd',
							'showOn'=>'button', // 'focus', 'button', 'both'
                                                        'buttonText'=>Yii::t('ui',' ... '),
							//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
							//'buttonImageOnly'=>true,
								),
				'htmlOptions'=>array(
			       'style'=>'width:150px;vertical-align:top',
                                    'readonly'=>'readonly',

					),// jquery plugin options

				));

			?>
		<?php echo $form->error($model,'fechaejec'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'labor'); ?>
            
                       <?php      
                            echo $form->textField($model,'labor',array('size'=>40,'disabled'=>'disabled'));    
                            ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
            
                       <?php      
                            echo $form->textArea($model,'texto');    
                            ?>
		<?php //echo $form->textArea($model,'txt',array('rows'=>3,'cols'=>50,'disabled'=>($editable)?'':'disabled')); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	


		
					
	<?php $this->endWidget(); ?>
<?php unset($form); ?>
