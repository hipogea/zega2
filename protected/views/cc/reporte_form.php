
<div class="division">
    <div class="wide form">


    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

        <div class="row">
            <?php if($model->getScenario()=='detalle') { ?>
            <?php echo $form->labelEx($model,'vceco'); ?>
            <?php echo $form->textField($model,'vceco',array('size'=>12)); ?>
            <?php echo $form->error($model,'vceco'); ?>
            <?php }   ?>

        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'fecha1'); ?>
            <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'my_date',
                'model'=>$model,
                'attribute'=>'fecha1',
                'language'=>Yii::app()->language=='es' ? 'es' : null,
                'options'=>array(
                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                    'showOn'=>'button', // 'focus', 'button', 'both'
                    'buttonText'=>Yii::t('ui','...'),
                    'dateFormat'=>'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                    'style'=>'width:120px;vertical-align:top',
                    'readonly'=>'readonly',
                    'size'=>12,
                    'disabled'=>$habilitado,
                ),
            )); ?>
            <?php echo $form->error($model,'fecha1'); ?>
        </div>
    
        <div class="row">
            <?php echo $form->labelEx($model,'fecha2'); ?>
            <?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'my_date',
                'model'=>$model,
                'attribute'=>'fecha2',
                'language'=>Yii::app()->language=='es' ? 'es' : null,
                'options'=>array(
                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                    'showOn'=>'button', // 'focus', 'button', 'both'
                    'buttonText'=>Yii::t('ui','...'),
                    'dateFormat'=>'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                    'style'=>'width:120px;vertical-align:top',
                    'readonly'=>'readonly',
                    'size'=>12,
                    'disabled'=>$habilitado,
                ),
            )); ?>
            <?php echo $form->error($model,'fecha2'); ?>

        </div>

        <div class="row">
            <?php if($model->getScenario()=='resumen') { ?>
            <?php echo $form->labelEx($model,'clasecolector'); ?>
            <?php echo $form->textField($model,'clasecolector',array('size'=>12)); ?>
            <?php echo $form->error($model,'clasecolector'); ?>
            <?php }   ?>
        </div>

        <div class="row buttons">

            <?php

           if($model->getScenario()=='resumen') {
            echo CHtml::ajaxSubmitButton("Ver.. .",
                array("cc/reporte"),
                array("type"=>"POST",

                    "update" => "#cancino",

                )
            ) ;

           } else {
               echo CHtml::SubmitButton("Ver.. ." ) ;
           }
            ?>
        </div>
    
    <?php $this->endWidget(); ?>


    </div><!-- form -->
</div><!-- form -->
<div id="cancino">


</div>


