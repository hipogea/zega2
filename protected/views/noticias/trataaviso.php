<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<div class="division">

    <div class="wide form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'noticias-form',
            'enableAjaxValidation'=>false,
        )); ?>


        <div class="row">
            <?php
            $botones=array(

                'save'=>array(
                    'type'=>'A',
                    'ruta'=>array(),
                    'visiblex'=>array('00'),
                    ),


                'ok'=>array(
                    'type'=>'B',
                    'ruta'=>array($this->id.'/aprobar',array('id'=>$model->id)),
                    'visiblex'=>array('00'),
                ),
                'tacho'=>array(
                    'type'=>'B',
                    'ruta'=>array($this->id.'/descartar',array('id'=>$model->id)),
                    'visiblex'=>array('00'),

                ),
                'out'=>array(
                    'type'=>'B',
                    'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
                    'visiblex'=>array('00'),
                ),

            );

            $this->widget('ext.toolbar.Barra',
                array(
                    //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                    'botones'=>$botones,
                    'size'=>24,
                    'extension'=>'png',
                    'status'=>'00',

                )
            );?>

        </div>























        <div class="row">

            <?php echo $form->labelEx($model,'tiponoticia'); ?>
            <?php  $datos = array('01' => 'Aviso','02'=> 'Onomastico','03'=> 'Efemeride');
            echo $form->DropDownList($model,'tiponoticia',$datos, array('empty'=>'--Seleccione un tipo--')  )  ;	?>
            <?php echo $form->error($model,'tiponoticia'); ?>

        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'txtnoticia'); ?>
            <?php echo $form->textArea($model,'txtnoticia',array('disabled'=>'disabled','rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'txtnoticia'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'fecha'); ?>
            <?php echo $form->textField($model,'fecha',array('disabled'=>'disabled')); ?>
            <?php echo $form->error($model,'fecha'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'autor'); ?>
            <?php echo $form->textField($model,'autor',array('disabled'=>'disabled')); ?>
            <?php echo $form->error($model,'autor'); ?>
        </div>


        <div class="row">
            <?php echo $form->labelEx($model,'fechapropuesta'); ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'model'=>$model,
                    'attribute'=>'fechapropuesta',
                    'value'=>$model->fechapropuesta,
                    'language' => 'es',
                    'htmlOptions' => array('readonly'=>"readonly"),
                    'options'=>array(
                        'autoSize'=>true,
                        'defaultDate'=>$model->fechapropuesta,
                        'dateFormat'=>'yy-mm-dd',
                        'showAnim'=>'fold',
                        //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                        //'buttonImageOnly'=>true,
                        //'buttonText'=>'Fecha',
                        'selectOtherMonths'=>true,
                        'showAnim'=>'slide',
                        'showButtonPanel'=>true,
                        'showOn'=>'button',
                        'showOtherMonths'=>true,
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                    ),
                )
            );?>
            <?php echo $form->error($model,'fechapropuesta'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'fexpira'); ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'model'=>$model,
                    'attribute'=>'fexpira',
                    'value'=>$model->fexpira,
                    'language' => 'es',
                    'htmlOptions' => array('readonly'=>"readonly"),
                    'options'=>array(
                        'autoSize'=>true,
                        'defaultDate'=>$model->fexpira,
                        'dateFormat'=>'yy-mm-dd',
                        'showAnim'=>'fold',
                        //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
                        //'buttonImageOnly'=>true,
                        //'buttonText'=>'Fecha',
                        'selectOtherMonths'=>true,
                        'showAnim'=>'slide',
                        'showButtonPanel'=>true,
                        'showOn'=>'button',
                        'showOtherMonths'=>true,
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                    ),
                )
            );?>
            <?php echo $form->error($model,'fexpira'); ?>
        </div>






        <div class="row">
            <?php
            echo $form->labelEx($model,'aprobado');
            echo $form->checkBox($model,'aprobado',array('disabled'=>'disabled'));
            echo $form->error($model,'aprobado');

            ?>
        </div>




        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>