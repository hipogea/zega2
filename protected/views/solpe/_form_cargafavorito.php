<?php

?>


<div class="wide form">


		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,

	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idenfavorito'); ?>
		<?php
		$criterio=new CDbCriteria;
		$criterio->addcondition("iduser=:viduser");
		$criterio->params=Array(":viduser"=> Yii::app()->user->id);
		?>
		<?php  $datos1 = CHtml::listData(Listamateriales::model()->findAll($criterio),'id','nombrelista');
		echo $form->DropDownList($model,'idenfavorito',$datos1, array('empty'=>'--Seleccione un listado--',  'disabled'=>'',
		) ) ;
		?>
		<?php echo $form->error($model,'idenfavorito'); ?>
	</div>
	
  <div class="row">
		<?php echo $form->labelEx($model,'tipsolpe'); ?>
		<?php echo $form->textField($model,'tipsolpe',array('size'=>1,'maxlength'=>1, 'disabled'=>(!$model->isNewRecord)?'Disabled' :$habilitado)); ?>
		<?php echo $form->error($model,'tipsolpe'); ?>
	</div><div class="row">
		<?php echo $form->labelEx($model,'tipimputacion'); ?>
		<?php echo $form->textField($model,'tipimputacion',array('size'=>1,'maxlength'=>1, 'disabled'=>(!$model->isNewRecord)?'Disabled' :$habilitado)); ?>
		<?php echo $form->error($model,'tipimputacion'); ?>
	</div>



<div class="row">
		<?php echo $form->labelEx($model,'fechaent'); ?>
		<?php if ($habilitado=='')
		
		{
		
		 $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechaent',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															'size'=>12,
															'disabled'=>$habilitado,
															),
															));

					 } else{
						echo $form->textField($model,'fechaent',array('disabled'=>'disabled','size'=>10)) ;
				
								}										
															
		?>		
		<?php echo $form->error($model,'fechaent'); ?>
	</div>
	
	


	<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'centro',$datos1, array('empty'=>'--Seleccione una referencia--',  'disabled'=>$habilitado,
													    ) ) ;
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>






	    <div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
			$this->widget('ext.matchcode.MatchCode',array(
												'nombrecampo'=>'imputacion',
												//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
												'ordencampo'=>2,
												'controlador'=>'Desolpe',
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'mifreerfuufu',
											//'nombrecampoareemplazar'=>'imputacion',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));

										 echo $form->error($model,'imputacion');



			   ?>
	</div>

	

	
	<div class="row buttons">
		<?php echo ($habilitado=='')?CHtml::submitButton(($model->isNewRecord)?'Agregar' : 'Actualizar'):''; ?>
	</div>




<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>420,
        'border'=>0,
    ),
    ));
?>
<iframe id="cru-frame3" style="border:0px; width:100%; height:100%;" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

