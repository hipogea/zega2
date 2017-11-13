<?php
/* @var $this DocumentosController */
/* @var $model Documentos */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documentos-form',
	'enableAjaxValidation'=>false,
)); ?>

	
<?php echo $form->hiddenField($model,'coddocu'); ?>
		
	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php echo $form->textField($model,'coddocu',array('disabled'=>(!$model->isNewRecord)?'disabled':'','size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desdocu'); ?>
		<?php echo $form->textField($model,'desdocu',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'desdocu'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'comprobante'); ?>
		<?php echo $form->checkBox($model,'comprobante'); ?>
		<?php echo $form->error($model,'comprobante'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'controlfisico'); ?>
		<?php echo $form->checkBox($model,'controlfisico'); ?>
		<?php echo $form->error($model,'controlfisico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clase'); ?>
		<?php echo $form->textField($model,'clase',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'clase'); ?>
	</div>
    
    

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'x_report'); ?>
		<?php echo $form->textField($model,'x_report',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'x_report'); ?>
	</div>






	<div class="row">
		<?php echo $form->labelEx($model,'coddocupadre'); ?>
		<?php 
		//$documento='032';
		$criterial = new CDbCriteria;
		$criterial->condition='coddocu <>:docu';
		$criterial->params=($model->isNewRecord)?array(':docu'=>'x'):array(':docu'=>"'".$model->coddocu."'");
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		 $datos = CHtml::listData(Documentos::model()->findall($criterial),'coddocu','desdocu');
		 				 echo $form->DropDownList($model,'coddocupadre',$datos, array('empty'=>'--Indique un documento padre--')  )  ;
		
		?>
		<?php echo $form->error($model,'coddocupadre'); ?>              
		
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idreportedefault');

		$datos = CHtml::listData(Coordocs::model()->findall(),'id','nombrereporte');
		echo $form->DropDownList($model,'idreportedefault',$datos, array('empty'=>'--Indique el reporte--')  )  ;
?>

		<?php echo $form->error($model,'idreportedefault'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prefijo'); ?>
		<?php echo $form->textField($model,'prefijo',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'prefijo'); ?>
	</div>
	

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

   





  <?php
                    $this->widget('zii.widgets.jui.CJuiTabs', array(
                     'theme' => 'default',
					'tabs' => array(
					'Opciones'=>array('id'=>'tab_',
'content'=>$this->renderPartial('tab_opciones', array('form'=>$form,'model'=>$model),TRUE)
																			), 
									
'Ajustes contables'=>array('id'=>'tab_.',
'content'=>$this->renderPartial('tab_cuentas', array('form'=>$form,'model'=>$model),TRUE)
																			), 
									),
					'options' => array(	'collapsible' => false,),
                    'id'=>'MyTabi',)
			                );
                            ?>
<?php $this->endWidget(); ?>
    </div>
</div>
    
<?php

//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog4',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
<iframe id="cru-frame4" width="100%" height="100%"></iframe>
<?php

$this->endWidget();

//--------------------- end new code --------------------------
?> 
           