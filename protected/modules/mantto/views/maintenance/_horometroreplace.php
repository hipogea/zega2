<br>

<?php $this->widget(
                    'booster.widgets.TbLabel',
                        array(
                        'context' => 'warning',
                            // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                            'label' => '                             Machine :     ',
                            )
                         );

?>
<div class="form">
<div class="division">
    <div class="wide form">
       
<?php 
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
       // 'htmlOptions' => array('class' => 'well'), // for inset effect
    )
);
?>

    
<?php echo $form->errorSummary($model); ?>

  
    <?php      
                            echo $form->hiddenField($model,'hidpadre',array('value'=>$id));    
                            echo $form->hiddenField($model,'hidequipo',array('value'=>$model->hidequipo));    
                            echo $form->hiddenField($model,'fechainicio',array('value'=>'2017-10-10'));    
                           
                            ?>
        
        
<div class="panelizquierdo">

    
   
    
     <div class="row">
		<?php echo $form->labelEx($model,'codigo');    ?>
                <?php      
                echo $form->textField($model,'codigo',array('size'=>12,'disabled'=>''));    
                ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>
    
     <div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
         
                <?php      
                echo $form->textField($model,'ubicacion',array('size'=>12,'disabled'=>''));    
                ?>
		<?php echo $form->error($model,'ubicacion'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'fechainicio'); ?>
         
                <?php      
                echo Chtml::textField(uniqid(),'2017-10-01',array('size'=>12,'value'=>'2017-10-01','disabled'=>'disabled'));    
                ?>
		<?php echo $form->error($model,'fechainicio'); ?>
	</div>
    

            
<div class="row">
		<?php echo $form->labelEx($model,'lecturaactual'); ?>
         
                <?php      
                echo $form->textField($model,'lecturaactual',array('size'=>8,'disabled'=>''));    
                ?>
		<?php echo $form->error($model,'lecturaactual'); ?>
	</div>
    
                

<div class="row">
		<?php echo $form->labelEx($model,'unidades'); ?>
         
                <?php      
                echo $form->textField($model,'unidades',array('size'=>8,'disabled'=>'disabled'));    
                ?>
		
	</div>

   


       
    </div>
    <div class="panelderecho">
   
	
    </div>
	<?php
   
    $this->widget(
    'booster.widgets.TbButton',
    array(
        'label' => 'Create Measurement Point',
        'context' => 'success',
        'context' => 'success',
        'htmlOptions'=>array('type'=>'input')
    )
); echo ' ';


    ?>
    </div>
</div>
    
</div>

		
					
	<?php $this->endWidget(); ?>
<?php unset($form); ?>
