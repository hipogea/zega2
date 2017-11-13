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
		<?php echo $form->labelEx($model,'hidevento'); ?>
		
		
		<?php  
                $criterio=New CDBCriteria;
                $criterio->addCondition("codocu=:vcodocu");
                $criterio->params=array(":vcodocu"=>$documento);
                //var_dump($documento);die();
                $datos = CHtml::listData(Eventos::model()->findAll($criterio),'id','descripcion');
		  echo $form->DropDownList($model,'hidevento',$datos, array('disabled'=>(!$model->isNewRecord)?'disabled':'',
									  'empty'=>'--Seleccione un evento--',) ) ;
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
		<?php echo $form->labelEx($model,'hidprevio'); ?>
		<?php
                $criteriob=New CDBCriteria;
                $criteriob->addCondition("id <> :vid");
                $criteriob->params=array(":vid"=>$model->id);
                 $datos = CHtml::listData(Tenenciasproc::model()->findAll($criteriob),'id','eventos.descripcion');
		
                echo $form->DropDownList($model,'hidprevio',$datos, array( 'empty'=>'--Seleccione un proceso requisito--',) ) ;
                ?>
		<?php echo $form->error($model,'hidprevio'); ?>
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
