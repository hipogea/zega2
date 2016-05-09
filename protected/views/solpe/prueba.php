
<div class="wide form">
 <?php  
 $habil=$this->eseditablecab($idcabeza);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
     //if (isset($_GET['ed'])) {   //si alguien coloco la URL EDITAR
     		//if ($_GET['ed']=='si') //si se presiono la opcion editar
     			if ($habil==='si') //si es editable la guia (VERIFICADO EN BASE DE DATOS)
     			   $habilitado='';
     
    // $habilitado='';

//echo "habil  ".($habil==='si');
          


  ?>

<?php
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
   
	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidsolpe',array('value'=>$idcabeza)):''; ?>
		
	</div>
	
  <div class="row">
		<?php echo $form->labelEx($model,'tipsolpe'); ?>
		<?php echo $form->textField($model,'tipsolpe',array('size'=>1,'maxlength'=>1, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'tipsolpe'); ?>
	</div><div class="row">
		<?php echo $form->labelEx($model,'tipimputacion'); ?>
		<?php echo $form->textField($model,'tipimputacion',array('size'=>1,'maxlength'=>1, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'tipimputacion'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
$datos = CHtml::listData(Ums::model()->findAll(),'um','um');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--', 'disabled'=>$habilitado)  )  ;						     
 ?>
		<?php echo $form->error($model,'um'); ?>
	</div>



	    <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
		if ($this->eseditable($model->est)=='')
		
						{	$this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'codart',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>6,
												'controlador'=>'Desolpe',
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'miffuufu',
											'nombrecampoareemplazar'=>'txtmaterial',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));

										 echo $form->error($model,'codart');

							} else{
								echo $form->textField($model,'codart',array('disabled'=>'disabled','size'=>10)) ;
						//echo $form->textField($model,'codart',array('disabled'=>'disabled','size'=>30)) ;
				
								}	
			   ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'fechaent'); ?>
		<?php if ($this->eseditable($model->est)=='')
		
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
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

					 } else{
						echo $form->textField($model,'fechaent',array('disabled'=>'disabled','size'=>10)) ;
				
								}										
															
		?>		
		<?php echo $form->error($model,'fechaent'); ?>
	</div>
	
	

	

	<div class="row">
		<?php //echo $form->labelEx($model,'c_descri'); ?>
		<?php //echo $form->textField($model,'c_descri',array('size'=>40,'maxlength'=>40)); ?>
		<?php //echo $form->error($model,'c_descri'); ?>
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
		if ($this->eseditable($model->est)=='')
		
						{	$this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'imputacion',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>2,
												'controlador'=>'Desolpe',
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'miffuufu',
											'nombrecampoareemplazar'=>'',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));

										 echo $form->error($model,'imputacion');

							} else{
								echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>10)) ;
						//echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>30)) ;
				
								}	
			   ?>
	</div>

	

	
	<div class="row">
		<?php echo $form->labelEx($model,'textodetalle'); ?>
		<?php echo $form->textArea($model,'textodetalle',array( 'disabled'=>$habilitado,'rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textodetalle'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
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
        'width'=>400,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>