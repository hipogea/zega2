<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
/* @var $form CActiveForm */
?>
    <div class="division">
        <div class="wide form">
            <div class="form">

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'cajachica-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation'=>false,
                )); ?>



                <?php echo $form->errorSummary($model); ?>
                <div class="row">
                    <?php echo $form->labelEx($model,'tipoflujo'); ?>
                    <?php  $datos1 = CHtml::listData(Tipoflujocaja::model()->findAll(),'codtipo','destipo');
                    echo $form->DropDownList($model,'tipoflujo',$datos1, array('empty'=>'--Seleccione el tipo--') ) ;
                    ?>
                    <?php echo $form->error($model,'tipoflujo'); ?>
                </div>




                <?php echo $form->hiddenField($model,'hidcaja',array('value'=>$idcabeza)); ?>


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

                <div class="row">
                    <?php echo $form->labelEx($model,'glosa'); ?>
                    <?php echo $form->textField($model,'glosa',ARRAY('size'=>40)); ?>
                    <?php echo $form->error($model,'glosa'); ?>
                </div>
                <div class="row">
                    <?php echo $form->labelEx($model,'referencia'); ?>
                    <?php echo $form->textField($model,'referencia',ARRAY('size'=>20)); ?>
                    <?php echo $form->error($model,'referencia'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'debe'); ?>
                    <?php echo $form->textField($model,'debe',ARRAY('size'=>8)); ?>
                    <?php echo $form->error($model,'debe'); ?>
                </div>
                <div class="row">
                    <?php echo $form->labelEx($model,'monedahaber'); ?>
                    <?php  $datos1 = CHtml::listData(TMoneda::model()->findAll(),'codmoneda','desmon');
                    echo $form->DropDownList($model,'monedahaber',$datos1, array('empty'=>'--Seleccione moneda--','disabled'=>'' ) ) ;
                    ?>

                    <?php echo $form->error($model,'monedahaber'); ?>
                </div>



                <div class="row">
                    <?php echo $form->labelEx($model,'codtra'); ?>
                    <?php
                    $this->widget('ext.matchcode.MatchCode',array(
                        'nombrecampo'=>'codtra',
                        'ordencampo'=>1,
                        'controlador'=>'Dcajachica',
                        'relaciones'=>$model->relations(),
                        'tamano'=>6,
                        'model'=>$model,
                        'form'=>$form,
                        'nombredialogo'=>'cru-dialog3',
                        'nombreframe'=>'cru-frame3',
                        'nombrearea'=>'fernfa3gt4jfdxxsfdf',
                    )); ?>
                    <?php echo $form->error($model,'codtra'); ?>
                </div>



                <div class="row">
                    <?php echo $form->labelEx($model,'ceco'); ?>
                    <?php
                    $this->widget('ext.matchcode.MatchCode',array(
                        'nombrecampo'=>'ceco',
                        'ordencampo'=>3,
                        'controlador'=>'Dcajachica',
                        'relaciones'=>$model->relations(),
                        'tamano'=>6,
                        'model'=>$model,
                        'form'=>$form,
                        'nombredialogo'=>'cru-dialog3',
                        'nombreframe'=>'cru-frame3',
                        'nombrearea'=>'fhdfjfgery',
                    )); ?>
                    <?php echo $form->error($model,'ceco'); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'codocu'); ?>
                    <?php  $datos1 = CHtml::listData(Documentos::model()->findAll("comprobante='1'"),'coddocu','desdocu');
                    echo $form->DropDownList($model,'codocu',$datos1, array('empty'=>'--Seleccione comprobante--') ) ;
                    ?>
                    <?php echo $form->error($model,'codocu'); ?>
                </div>




                <div class="row buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                </div>

                <?php $this->endWidget(); ?>

            </div><!-- form -->
        </div>
    </div>
























<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>600,
    ),
));
?>
    <iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>