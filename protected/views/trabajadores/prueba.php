<H1>
    <?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'money.png',"hola",array('width'=>'25','height'=>'25')); ?>
    Cargo a rendir usuario
</H1>
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
            <?php
            $botones=array(
                'add'=>array(
                    'type'=>'C',
                    'ruta'=>array($this->id.'/creadetallecaja',array(
                        'id'=>$model->id,"cest"=>'10',
                        //"id"=>$model->n_direc,
                        "asDialog"=>1,
                        "gridId"=>'detalle-grid',
                    )
                    ),
                    'dialog'=>'cru-dialog2',
                    'frame'=>'cru-frame2',
                    'visiblex'=>array('10'),

                ),
                'minus'=>array(
                    'type'=>'D',
                    'ruta'=>array('cajachica/borraitems',array()),
                    'opajax'=>array(
                        'type'=>'POST',
                        'url'=>ARRAY('cajachica/borraitems',array()),
                        'success'=>'js:function(data) { $.fn.yiiGridView.update("detalle-grid"); alert(data);}',
                        'beforeSend' => 'js:function(){
									 var r = confirm("¿Esta seguro de Eliminar estos Items?");
 										if(!r){return false;}
 										}
 								',
                    ),
                    'visiblex'=>array('10'),
                ),
                
                'balanza'=>array(
                    'type'=>'D',
                    'ruta'=>array('cajachica/aprobaritem',array("id"=>$model->id)),
                    'opajax'=>array(
                        'type'=>'POST',
                        'url'=>ARRAY('cajachica/aprobaritem',array("id"=>$model->id)),
                        'success'=>'js:function(data) { $.growlUI("Growl Notification", data,2400); }',
                       
                    ),
                    'visiblex'=>array('10'),
                ),
                
                
            );
            $this->widget('ext.toolbar.Barra',
                array(
                    //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                    'botones'=>$botones,
                    'size'=>24,
                    'extension'=>'png',
                    'status'=>'10',
                )
            );  ?>
            <div class="row">
                <?php echo $form->labelEx($modelocabecera,'hidfondo'); ?>
                <?php
                echo CHtml::textField('desfondo',$modelocabecera->fondo->desfondo,ARRAY('size'=>40,'disabled'=>'disabled'));
                ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'codtra'); ?>
                <?php
                echo CHtml::textField('codtra',$model->trabajadores->ap.' - '.$modelocabecera->trabajadores->am,ARRAY('size'=>40,'disabled'=>'disabled'));
                ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($modelocabecera,'descripcion'); ?>
                <?php echo $form->textField($modelocabecera,'descripcion',ARRAY('size'=>40,'disabled'=>'disabled')); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'fecha'); ?>
                <?php echo $form->textField($model,'fecha',ARRAY('size'=>20,'disabled'=>'disabled')); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'glosa'); ?>
                <?php echo $form->textField($model,'glosa',ARRAY('size'=>40,'disabled'=>'disabled')); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model,'debe'); ?>
                <?php echo $form->textField($model,'debe',ARRAY('size'=>15,'disabled'=>'disabled')); ?>
            </div>
            
            <div class="row">
                <?php echo $form->labelEx($model,'codestado'); ?>
                <?php echo  CHtml::openTag("span",array("class"=>"label badge-error")).$model->estado->estado.CHtml::closeTag("span"); ?>
            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<?PHP if(!$model->isNewRecord ){ ?>
    <?php	$this->renderpartial('vw_detalle_caja',array('model'=>$model,'modelcabecera'=>$modelocabecera)); ?>
<?php
}
?>

   <?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog2',
    'options'=>array(
        'title'=>'Contactos',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>600,
    ),
));
?>
<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php
$this->endWidget();
//--------------------- end new code --------------------------
?>
<?php
 $createUrl = $this->createUrl('/clipro/creacontacto',
     array(
         //"id"=>$model->n_direc,
         "asDialog"=>1,
         "gridId"=>'contactos-grid',
         "codpro"=>'970005',
     )
 );
 echo CHtml::link('Agregar contacto','#',array('onclick'=>"$('#cru-frame2').attr('src','$createUrl '); $('#cru-dialog2').dialog('open');"));
?>

