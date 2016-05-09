<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<div class="division">

<div class="wide form">

    <?php

   $administra=Noticias::isAdminTablon();

        ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'noticias-form',
	'enableAjaxValidation'=>false,
)); ?>

    <?php
    echo "<div class='botones'>";
    echo CHtmL::imageButton(Yii::app()->getTheme()->baseUrl.'/img/save.png', array ( ));
    echo "</div>";

    ?>


               <div class="row">

						<?php echo $form->labelEx($model,'tiponoticia'); ?>
						<?php  $datos = array('01' => 'Aviso','02'=> 'Onomastico','03'=> 'Efemeride');
							echo $form->DropDownList($model,'tiponoticia',$datos, array('empty'=>'--Seleccione un tipo--')  )  ;	?>
						<?php echo $form->error($model,'tiponoticia'); ?>
	
					</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txtnoticia'); ?>
		<?php echo $form->textArea($model,'txtnoticia',array('disabled'=>($administra)?'disabled':'','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'txtnoticia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha',array('disabled'=>($administra)?'disabled':'')); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'autor'); ?>
		<?php echo $form->textField($model,'autor',array('disabled'=>($administra)?'disabled':'')); ?>
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
		<?php  if ($administra)  {
		 echo $form->labelEx($model,'aprobado'); 
		 echo $form->checkBox($model,'aprobado');
		 echo $form->error($model,'aprobado'); 
		 	}
		 ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'mensaje'); ?>
		<?php echo $form->textField($model,'mensaje',array('size'=>1,'maxlength'=>1,'disabled'=>($administra)?'disabled':'')); ?>
		<?php echo $form->error($model,'mensaje'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
</div>