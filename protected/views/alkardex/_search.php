<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



    <div class="row">
        <?php
        $botones=array(
            'search'=>array(
                'type'=>'A',
                'ruta'=>array(),
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
        ); ?>

    </div>
    <div class="panelizquierdo">




        <div class="row">
            <?php echo $form->labelEx($model,'codart'); ?>
            <?php
            $this->widget('ext.matchcode1.Seleccionavarios',array(
                    'nombrecampo'=>'codart',
                    //'ordencampo'=>1,
                    'controlador'=>'VwKardex',
                    'relaciones'=>$model->relations(),
                    'tamano'=>8,
                    'model'=>$model,
                    'nombremodelo'=>'Maestrocompo',
                    'form'=>$form,
                    'nombredialogo'=>'cru-dialog3',
                    'nombreframe'=>'cru-frame3',
                    //'nombrearea'=>'fehdfj',
                )

            );


            ?>
        </div>

	<div class="row">
		<?php echo $form->label($model,'codmov'); ?>

        <?php  $datos1 = CHtml::listData(Almacenmovimientos::model()->findAll(array('order'=>'movimiento')),'codmov','movimiento');
          echo $form->DropDownList($model,'codmov',$datos1, array('empty'=>'--Seleccione un movimiento--',))   ;
        ?>

    </div>



	<div class="row">
		<?php echo $form->label($model,'alemi'); ?>
		<?php echo $form->textField($model,'alemi',array('size'=>3,'maxlength'=>3)); ?>
	</div>



        <div class="row">
            <?php echo $form->labelEx($model,'fecha'); ?>
            <?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'model'=>$model,
                    'attribute'=>'fecha',
                    'value'=>$model->fecha,
                    'language' => 'es',
                    'htmlOptions' => array('readonly'=>"readonly"),
                    'options'=>array(
                        'autoSize'=>true,
                        'defaultDate'=>$model->fecha,
                        'dateFormat'=>'yy-mm-dd',
                        'showAnim'=>'fold',
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
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'fecha1'); ?>


            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
                array(
                    'model'=>$model,
                    'attribute'=>'fecha1',
                    'value'=>$model->fecha1,
                    'language' => 'es',
                    'htmlOptions' => array('readonly'=>"readonly"),
                    'options'=>array(
                        'autoSize'=>true,
                        'defaultDate'=>$model->fecha1,
                        'dateFormat'=>'yy-mm-dd',
                        'showAnim'=>'fold',

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

        </div>






	<div class="row">
		<?php echo $form->label($model,'codocuref'); ?>
		<?php echo $form->textField($model,'codocuref',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numdocref'); ?>
		<?php echo $form->textField($model,'numdocref',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codcentro'); ?>
        <?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
        echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione un centro--',
        ) ) ; ?>
	</div>



  </div> <!--panel izquierdo !-->
    <div class="panelderecho">






	<div class="row">
		<?php echo $form->label($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numkardex'); ?>
		<?php echo $form->textField($model,'numkardex',array('size'=>14,'maxlength'=>14)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'solicitante'); ?>
		<?php echo $form->textField($model,'solicitante',array('size'=>18,'maxlength'=>18)); ?>
	</div>




</div> <!--panel derecho !-->
<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div><!-- search-form -->


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>700,
        'height'=>500,
    ),
));
?>
    <iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>