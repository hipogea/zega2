<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>true,
	

)); ?>

<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'idpadre'); ?>
		<?php 
				//$criteria=""
			$datos = CHtml::listData(Dcotmateriales::model()->findAll("hidguia=:idcabeza  and estadodetalle <>'07' ",array( ":idcabeza"=>($model->isNewRecord)?$idcabeza:$model->hidguia)),'id','descri');
					echo $form->DropDownList($model,'idpadre',$datos, array('empty'=>'--Escoja el item superior--')  )  ;						     
 			?>
		<?php echo $form->error($model,'idpadre'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php 
				//$criteria=""
			$datos = CHtml::listData(Dcottipo::model()->findAll(),'codtipo','destipo');
					echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Escoja el tipo--')  )  ;						     
 			?>
		<?php echo $form->error($model,'tipo'); ?>
	
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>



	


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php $this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'codart',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>6,
												'controlador'=>'Dcotmateriales',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'habilitado'=>true,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'miffuufu',
											'nombrecampoareemplazar'=>'descri',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));
				?>

		<?php echo $form->error($model,'codart'); ?>									
		<?php echo $form->error($model,'descri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punit'); ?>
		<?php echo $form->textField($model,'punit'); ?>
		<?php echo $form->error($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disp'); ?>
		<?php echo $form->textField($model,'disp',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'disp'); ?>
	</div>



	





	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoitem'); ?>
		<?php echo $form->textField($model,'tipoitem',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipoitem'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
			$datos = CHtml::listData(Ums::model()->findAll(),'um','um');
					echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--')  )  ;						     
 			?>
		<?php echo $form->error($model,'um'); ?>
	</div>


	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidguia',array('value'=>$idcabeza)):""; ?>
	
		
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>






<?php $this->endWidget(); ?>

</div><!-- form -->
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
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>