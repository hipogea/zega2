<?php
/* @var $this TrabajadoresController */
/* @var $model Trabajadores */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trabajadores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con  <span class="required">*</span> Son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>


	<?php $this->widget('ext.AskToSaveWork', array('watchElement'=>'Trabajadores_codigotra','message'=>"You haven't save your product yet!"))?>


	<!-- aqui comiemza el flashhh
    <?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
    ?>


    -- aqui comiemza el flashhh --!>


    <div class="row">
        <?php echo $form->labelEx($model,'activo'); ?>
        <?php echo $form->checkBox($model,'activo');?>
        <?php echo $form->error($model,'activo'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model,'codigotra'); ?>
        <?php echo $form->textField($model,'codigotra',array('size'=>4,'maxlength'=>4,'disabled'=>'DISABLED')); ?>
        <?php echo $form->error($model,'codigotra'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'ap'); ?>
        <?php echo $form->textField($model,'ap',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'ap'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'am'); ?>
        <?php echo $form->textField($model,'am',array('size'=>35,'maxlength'=>35)); ?>
        <?php echo $form->error($model,'am'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'nombres'); ?>
        <?php echo $form->textField($model,'nombres',array('size'=>35,'maxlength'=>35)); ?>
        <?php echo $form->error($model,'nombres'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'fecingreso'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            //'name'=>'my_date',
            'model'=>$model,
            'attribute'=>'fecingreso',
            'language'=>Yii::app()->language=='es' ? 'es' : null,
            'options'=>array(
                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                'showOn'=>'button', // 'focus', 'button', 'both'
                'buttonText'=>Yii::t('ui','...'),
                'dateFormat'=>'yy-mm-dd',
                'changeYear'=>true,
                'yearRange'=>'1950:2020',
            ),
            'htmlOptions'=>array(
                'style'=>'width:80px;vertical-align:top',
                'readonly'=>'readonly',

            ),
        ));
        ?>
        <?php echo $form->error($model,'fecingreso'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'domicilio'); ?>
        <?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>60)); ?>
        <?php echo $form->error($model,'domicilio'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'tiposangre'); ?>
        <?php echo $form->textField($model,'tiposangre',array('size'=>10,'maxlength'=>10)); ?>
        <?php echo $form->error($model,'tiposangre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'telfijo'); ?>
        <?php echo $form->textField($model,'telfijo',array('size'=>25,'maxlength'=>25)); ?>
        <?php echo $form->error($model,'telfijo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'telmoviles'); ?>
        <?php echo $form->textField($model,'telmoviles',array('size'=>25,'maxlength'=>25)); ?>
        <?php echo $form->error($model,'telmoviles'); ?>
    </div>


 <div style="float: left; width:300px;"> 	
						<?php echo $form->labelEx($model,'tipodoc'); ?>
						
						<?php    echo $form->DropDownList($model,'tipodoc',Trabajadores::tipoDocumento(), array('empty'=>'--Seleccione tipo Doc--')  )  ;	?>
						<?php echo $form->error($model,'tipodoc'); ?>	
</div>
 
 
 
    <div class="row">
        <?php echo $form->labelEx($model,'dni'); ?>
        <?php echo $form->textField($model,'dni',array('size'=>8,'maxlength'=>8)); ?>
        <?php echo $form->error($model,'dni'); ?>
    </div>



<div class="row">
        <?php echo $form->labelEx($model,'cumple'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        //'name'=>'my_date',
                                        'model'=>$model,
                                        'attribute'=>'cumple',
                                        'language'=>Yii::app()->language=='es' ? 'es' : null,
                                            'options'=>array(
                                                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                                                    'showOn'=>'button', // 'focus', 'button', 'both'
                                                    'buttonText'=>Yii::t('ui','...'),
                                                    'dateFormat'=>'yy-mm-dd',

                                                //'changeMonth'=>true,
                                                'changeYear'=>true,
                                                'yearRange'=>'1950:2020',
                                                        ),
                                                'htmlOptions'=>array(
                                                            'style'=>'width:80px;vertical-align:top',
                                                            'readonly'=>'readonly',

                                                            ),
                                                            ));
            ?>
        <?php echo $form->error($model,'cumple'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'codpuesto'); ?>

        <?php  $datos = CHtml::listData(Oficios::model()->findAll(array('order'=>'oficio')),'codof','oficio');
                    echo $form->DropDownList($model,'codpuesto',$datos, array('empty'=>'--Seleccione un oficio --')  );
                    ?>



        <?php //echo $form->textField($model,'codpuesto',array('size'=>3,'maxlength'=>3)); ?>
        <?php echo $form->error($model,'codpuesto'); ?>
    </div>

            <div class="row">
        <?php echo $form->labelEx($model,'iduser'); ?>
        <?php
            $comboList = array();
                foreach(Yii::app()->user->um->listUsers() as $user){
        // evitando al invitado
                /*if($user->primaryKey == CrugeUtil::config()->guestUserId)
                        break;*/
        // en este caso 'firstname' y 'lastname' son campos personalizados
                //$firstName = Yii::app()->user->um->getFieldValue($user,'firstname');
                //$lastName = Yii::app()->user->um->getFieldValue($user,'lastname');
                $comboList[$user->primaryKey] = $user->username;
                    }
    echo $form->dropDownList($model,'iduser',$comboList, array('empty'=>'--Seleccione usuario--'));



        ?>



        <?php echo $form->error($model,'iduser'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
    </div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->