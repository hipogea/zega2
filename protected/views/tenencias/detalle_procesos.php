<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docingresados-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        // 'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>false,
	
)); ?>

				
		<?php  echo $form->errorSummary($model); ?>	
    
    <div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','referencia');
		  echo $form->DropDownList($model,'codocu',$datos, array(  'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl('Tenencias/ajaxcargaeventos'), //  la acción que va a cargar el segundo div 
									    'update' => '#Tenenciasproc_hidevento' // el div que se va a actualizar
											  ),
									  'empty'=>'--Seleccione un documento--', 'disabled'=>($model->nprocesosdocu >0)?'disabled':'',) ) ;
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>
    
    
    <div class="row">
		<?php echo $form->labelEx($model,'hidevento'); ?>
		 <?php 
		     if (!$model->isNewRecord) {
		      $criterio=New CDBCriteria;
                $criterio->addCondition("codocu=:vcodocu");
                $criterio->params=array(":vcodocu"=>$model->codocu);
                //var_dump($documento);die();
                $datosx = CHtml::listData(Eventos::model()->findAll($criterio),'id','descripcion');
		  }
		 echo $form->dropDownList($model,'hidevento', ($model->isNewRecord)?array():$datosx, array(
                                                                        'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl('Tenencias/ajaxcargaprevios'), //  la acción que va a cargar el segundo div 
									    'update' => '#Tenenciasproc_hidprevio' // el div que se va a actualizar
											  ),
                                                        'prompt' => 'Seleccione proceso previo', // Valor por defecto 
                                                            'disabled'=>($model->nprocesosdocu >0)?'disabled':'',
                                                        )); 
		 ?>
		<?php echo $form->error($model,'hidevento'); ?>
	</div>
    
    
    
    <div class="row">
		<?php echo $form->labelEx($model,'nhorasverde'); ?>
		<?php echo $form->textField($model,'nhorasverde',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'nhorasverde'); ?>
	</div>

     <div class="row">
		<?php echo $form->labelEx($model,'nhorasnaranja'); ?>
		<?php echo $form->textField($model,'nhorasnaranja',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'nhorasnaranja'); ?>
	</div>
     <div class="row">
		<?php echo $form->labelEx($model,'final'); ?>
		<?php echo $form->CheckBox($model,'final'); ?>
		<?php echo $form->error($model,'final'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'automatico'); ?>
		<?php echo $form->CheckBox($model,'automatico'); ?>
		<?php echo $form->error($model,'automatico'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'renuevavencimiento'); ?>
		<?php echo $form->CheckBox($model,'renuevavencimiento'); ?>
		<?php echo $form->error($model,'renuevavencimiento'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'esmensaje'); ?>
		<?php echo $form->CheckBox($model,'esmensaje'); ?>
		<?php echo $form->error($model,'esmensaje'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'hidprevio'); ?>
		<?php
                 if (!$model->isNewRecord) {
                $criteriob=New CDBCriteria;
                $criteriob->addCondition("id <> :vid and codocu=:vcodocu and final <> '1' ");
                $criteriob->params=array(":vid"=>$model->id,":vcodocu"=>$model->codocu);
                 $datos = CHtml::listData(Tenenciasproc::model()->findAll($criteriob),'id','auxiliar');
                 }else{
                     $datos=array();
                 }
                echo $form->DropDownList($model,'hidprevio',$datos, array( 'empty'=>'--Seleccione un proceso requisito--',) ) ;
                ?>
		<?php echo $form->error($model,'hidprevio'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'msgexterno'); ?>
		<?php echo $form->textArea($model,'msgexterno'); ?>
		<?php echo $form->error($model,'msgexterno'); ?>
	</div>
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>
    
    
    <?php $this->endWidget(); ?>
    
</div><!-- form -->

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
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
