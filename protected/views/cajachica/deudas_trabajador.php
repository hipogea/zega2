<div class="division">
<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form',
	'enableAjaxValidation'=>false,
)); ?>
    
     
    <div class="row">

        <?php echo $form->hiddenField($model,'hidcaja',array('value'=>$identidadcaja)); ?>
        
		<?php echo $form->labelEx($model,'codtra'); ?>
		
		<?php
                $opajax=array(
                    'type' => 'POST',
                    'url' => CController::createUrl('trabajadores/ajaxllenazonadeudas'), //  la acción que va a cargar el segundo div
                    'update' => '#zonadeudas', // el div que se va a actualizar
                    'data'=>array('trabajador'=>'js:Dcajachica_codtra.value'),
			);
		
		echo $form->DropDownList($model,'codtra',CHtml::listData(VwTrabajadores::model()->findAll(), 'codigotra', 'nombrecompleto'), array('ajax'=>$opajax,'empty'=>'--Seleccione Trabajador--' ) ) ;



		?>
		<?php echo $form->error($model,'codtra'); ?>
		
		
	</div>
    
     <div class="row">
                    <?php echo $form->labelEx($model,'fecha'); ?>
                    <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        //'name'=>'my_date',
                        'model'=>$model,
                        'attribute'=>'fecha',
                        'language'=>Yii::app()->language=='es' ? 'es' : null,
                        'options'=>array(
                            'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                            'showOn'=>'button', // 'focus', 'button', 'both'
                            'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
                            'buttonImageOnly'=>true,
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'width:60px;vertical-align:top',
                            'readonly'=>'readonly',
                        ),
                    )); ?>
                    <?php echo $form->error($model,'fecha'); ?>
                </div>
    <div id="zonadeudas">
        
    </div>
    
    
           
    <?php
    $this->endWidget();    
    ?>

</div>      
</div> 
</div>        
       

