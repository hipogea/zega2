<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">
<div class="wide form">
    <div class="division">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'config-_form_config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
			<?php echo $form->labelEx($model,'codocu'); ?>
			<?php $data=CHTml::listData(Documentos::model()->findall(),'coddocu','referencia'); ?>
			<?php echo $form->dropDownList($model,'codocu',$data,array('empty'=>'Seleccione un documento')); ?>
			<?php echo $form->error($model,'codocu'); ?>
		</div>
        
        <div class="row">
			<?php echo $form->labelEx($model,'codcen'); ?>
			<?php $data=CHTml::listData(Centros::model()->findall(),'codcen','nomcen'); ?>
			<?php echo $form->dropDownList($model,'codcen',$data,array('empty'=>'Seleccione el centro')); ?>
			<?php echo $form->error($model,'codcen'); ?>
		</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'codparam'); ?>
		
                    <?php
                    
               $this->widget('ext.matchcode.MatchCode',array(
            'nombrecampo'=>'codparam',
            'ordencampo'=>1,
            'controlador'=>get_class($model),
            'relaciones'=>$model->relations(),
            'tamano'=>1,
            'model'=>$model,
            'form'=>$form,
            'nombredialogo'=>'cru-dialog3',
            'nombreframe'=>'cru-frame3',
            'nombrearea'=>'fhxvvdfj',
                             ));
                
                             ?>
            
            
		<?php echo $form->error($model,'codparam'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'explicacion'); ?>
		<?php echo $form->textArea($model,'explicacion'); ?>
		<?php echo $form->error($model,'explicacion'); ?>
	</div>

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

	


	<div class="row buttons">
		<?php echo CHtml::submitButton('Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
    </div>
</div><!-- form -->

<?php
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
		




		<?php $this->endWidget(); ?>