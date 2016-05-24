<?php  MiFactoria::titulo(' Detalle de material '.$modelodetalle->codart.'  En centro -> ( '.
    $modelodetalle->codcentro.' )   Almacen ->  ( '.$modelodetalle->codal.' )','package')   ?>
    <div class="division">
        <div class="wide form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'maestrocompo-form',
            'enableClientValidation'=>TRUE,
            'clientOptions' => array(
                'validateOnSubmit'=>true,
                'validateOnChange'=>true
            ),
            'enableAjaxValidation'=>FALSE,
        )); ?>


            <div class="row">
                <?php
                $botones=array(
                    'save' => array(
                        'type' => 'A',
                        'ruta' => array(),
                        'visiblex' => array('10'),
                    ),

                );
                $this->widget('ext.toolbar.Barra',
                    array(
                        //'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
                        'botones'=>$botones,
                        'size'=>24,
                        'extension'=>'png',
                        'status'=>'10')); ?>

            </div>

        <?php $habilitado=''; ?>
        <?php echo $form->hiddenField($modelodetalle,'codart'); ?>
        <?php echo $form->hiddenField($modelodetalle,'codcentro'); ?>
        <?php echo $form->hiddenField($modelodetalle,'codal'); ?>


            <div class="panelderecho">

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'supervisionautomatica'); ?>
        <?php echo $form->checkBox($modelodetalle,'supervisionautomatica'); ?>
        <?php echo $form->error($modelodetalle,'supervisionautomatica'); ?>
    </div>


    <div class="row">
		<?php echo $form->labelEx($modelodetalle,'canteconomica'); ?>
		<?php echo $form->textField($modelodetalle,'canteconomica',array('size'=>10,'maxlength'=>10,'disabled'=>'')); ?>
		<?php echo $form->error($modelodetalle,'canteconomica'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($modelodetalle,'sujetolote'); ?>
            <?php echo $form->checkBox($modelodetalle,'sujetolote',array('disabled'=>($modelodetalle->maestro->esmateriallibrecentro($model->codcent))?'':'disabled')); ?>
            <?php echo $form->error($modelodetalle,'sujetolote'); ?>
        </div>



    <div class="row">
		<?php echo $form->labelEx($modelodetalle,'cantreposic'); ?>
		<?php echo $form->textField($modelodetalle,'cantreposic',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'cantreposic'); ?>
    </div>




   <div class="row">
		<?php echo $form->labelEx($modelodetalle,'cantreorden'); ?>
		<?php echo $form->textField($modelodetalle,'cantreorden',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'cantreorden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelodetalle,'leadtime'); ?>
		<?php echo $form->textField($modelodetalle,'leadtime',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($modelodetalle,'leadtime'); ?>
	</div>

    <div class="row">

        <?php echo $form->labelEx($modelodetalle,'catval'); ?>
        <?php if(yii::app()->hasModule('contabilidad')){  ?>
        <?php  $datos1 = CHtml::listData(Catvaloracion::model()->findAll("tipo='M'"),'codcatval','descat');
        echo $form->DropDownList($modelodetalle,'catval', $datos1,array('prompt' =>'Seleccione un grupo','disabled'=>($modelodetalle->maestro->esmateriallibrealmacen($modelodetalle->codcentro,$modelodetalle->codal))?'':'disabled')); ?>

             <?php } else { ?>
            <?php echo $form->textField($modelodetalle,'catval',array('size'=>5,'maxlength'=>5,'disabled'=>($modelodetalle->maestro->esmateriallibrealmacen($modelodetalle->codcentro,$modelodetalle->codal))?'':'disabled')); ?>

        <?php }  ?>
        <?php echo $form->error($modelodetalle,'catval'); ?>
    </div>

            </div>
        <div class="panelizquierdo">

            <div class="row">
                <?php echo $form->labelEx($modelodetalle,'repautomatica'); ?>
                <?php echo $form->checkbox($modelodetalle,'repautomatica',array('disabled'=>(yii::app()->settings->get('inventario','inventario_auto')=='1')?'':'disabled')); ?>
                <?php echo $form->error($modelodetalle,'repautomatica'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($modelodetalle,'cantsol'); ?>
                <?php echo $form->textField($modelodetalle,'cantsol',array('size'=>6,'disabled'=>(yii::app()->settings->get('inventario','inventario_auto')=='1')?'':'disabled')); ?>
                <?php echo $form->error($modelodetalle,'cantsol'); ?>
            </div>




            <div class="row">
        <?php echo $form->labelEx($modelodetalle,'punitv'); ?>
        <?php echo $form->textField($modelodetalle,'punitv',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
        <?php echo $form->error($modelodetalle,'punitv'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'punitstd'); ?>
        <?php echo $form->textField($modelodetalle,'punitstd',array('size'=>10,'maxlength'=>10,'disabled'=>$habilitado)); ?>
        <?php echo $form->error($modelodetalle,'punitstd'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($modelodetalle,'controlprecio'); ?>
        <?php  $array = array('V' => 'Promedio variable', 'F' => 'PEPS (FIFO)  ','L'=>'UEPS (LIFO)');?>

        <?php echo $form->dropDownList($modelodetalle,'controlprecio',$array,array('disabled'=>($modelodetalle->maestro->esmateriallibrealmacen($modelodetalle->codcentro,$modelodetalle->codal))?'':'disabled')); ?>
        <?php echo $form->error($modelodetalle,'controlprecio'); ?>
    </div>
            <div class="row">
                <?php echo $form->labelEx($modelodetalle,'bloqueo'); ?>
                <?php  $array1 = array('A' => 'Ninguno', 'B' => 'Nivel compras','C'=>'Total');?>

                <?php echo $form->dropDownList($modelodetalle,'bloqueo',$array1,array('value'=>'A','disabled'=>($modelodetalle->maestro->esmateriallibrealmacen($modelodetalle->codcentro,$modelodetalle->codal))?'':'disabled')); ?>
                <?php echo $form->error($modelodetalle,'bloqueo'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($modelodetalle,'tolerancia'); ?>
                <?php echo $form->textField($modelodetalle,'tolerancia',array('size'=>4,'maxlength'=>8,'disabled'=>$habilitado)); ?>
                <?php echo $form->error($modelodetalle,'tolerancia'); ?>
            </div>



            </div>
        <?php

        $this->endWidget();
        //--------------------- end new code --------------------------
        ?>

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