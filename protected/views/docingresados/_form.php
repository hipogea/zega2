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
	'enableAjaxValidation'=>true,
	
)); ?>

	

	<fieldset>
	    
			<div style="float: left; width:800px; padding:3px;">	
				<div style="float: left; width:400px; padding:3px;">
	<div class="row">
	   <div class="row">
		<?php echo $form->labelEx($model,'codlocal'); ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codlocal',$datos, array('empty'=>'--Llene el centro--',
													   'options'=>array(
													          isset(Yii::app()->session['codlocal'])?Yii::app()->session['codlocal']:''=>array('selected'=>true)
																		)  ));
					?>
		<?php echo $form->error($model,'codlocal'); ?>
	</div>
	
		<?php echo $form->labelEx($model,'codprov'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codprov',
												'ordencampo'=>1,
												'defol'=>(isset(Yii::app()->session['codprov']))?Yii::app()->session['codprov']:'',
												//'defol2'=>isset(Yii::app()->session['desprov'])?Yii::app()->session['desprov']:'',
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'coci',
													)
													
								);
		?>				
	</div>
	
	
	
	
			<div style='float: left; background-color :#CEF6F5; '>	
			<div id="<?php echo ucwords(strtolower(trim($this->id))).'_codprov_99'; ?>" >
					 <?php 
					 if (!$model->isNewRecord)  
					  echo CHTml::textField($model->clipro->despro,$model->clipro->despro, array('disabled'=>'disabled','size'=>40,'maxlength'=>40))  ;

					  ?>
			</div>
			</div>
			<div style='float: left;'>
					<?php echo $form->error($model,'codprov'); ?>
			</div>

	
	
	
	
	
  
   <div class="row">
		  <?php //echo "hfkshfskhtetetetetetetete"; ?>
		<?php //echo $model->isNewRecord ? '' : (
		                                       //ChTML::textField(
											            //         "ddd",
															//	$model->clipro->despro,
																// array('size'=>20,'maxlength'=>20,
																 // 'value'=> gettype($model->clipro->despro),
																// )
												//)); 
		?>
		
	</div>
  
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecha',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'dd-mm-yy',
														),
												'htmlOptions'=>array(
															'style'=>'width:80px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

		?>	
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechain'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										
										'attribute'=>'fechain',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'dd-mm-yy',
														),
												'htmlOptions'=>array(
															'value'=>(  ($model->isNewRecord ) and    isset(Yii::app()->session["fechain"]) ) ?Yii::app()->session["fechain"]:$model->fechain,
															'style'=>'width:80px;vertical-align:top',
															'readonly'=>'readonly',
															 
															),
															));

		?>	
		<?php echo $form->error($model,'fechain'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'conservarvalor'); ?>
		<?php echo $form->checkBox($model,'conservarvalor',array('value'=>'1')); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>
	<div class="row">
		<?php 
		         if (!$model->isNewRecord ) {
						echo $form->labelEx($model,'correlativo'); 
						echo $form->textField($model,'correlativo',array('size'=>8,'maxlength'=>8));
				 }
		?>
		
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipodoc'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'tipodoc',$datos, array(
		                                               'empty'=>'--Seleccione un documento--',
													   'options'=>array(
													          isset(Yii::app()->session['tipodoc'])?Yii::app()->session['tipodoc']:''=>array('selected'=>true)
																		) 
																		
																) ) ;
		?>
		<?php echo $form->error($model,'tipodoc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php  $datos = array('D' => 'Dolares ','S'=> 'Soles');
		  
			echo $form->DropDownList($model,'moneda',$datos, array('empty'=>'--Indique la moneda--','options'=>array(
													          isset(Yii::app()->session['moneda'])?Yii::app()->session['moneda']:''=>array('selected'=>true)
																		) 
																		
																))   ;	?>
			<?php echo $form->error($model,'moneda'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'descorta'); ?>
		<?php echo $form->textField($model,'descorta',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'descorta'); ?>
	</div>

	
	
	
	
	
	
	</div>
	
	
	
	
	
	<div style="float: left; clear:right;  width:350px; padding:3px;">
	
	
	
    
	<div class="row">
		<?php echo $form->labelEx($model,'codepv'); ?>
		<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codepv',$datos, array('empty'=>'--Seleccione una Embarcacion --','options'=>array(
													          isset(Yii::app()->session['codepv'])?Yii::app()->session['codepv']:''=>array('selected'=>true)
																		) 
																		
																)  )
					?>
		<?php echo $form->error($model,'codepv'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php  $datos = array('192' => 'Operaciones ','193'=> 'Mantenim.','194'=> 'Adm Flota.');
		  
			echo $form->DropDownList($model,'codgrupo',$datos, array('empty'=>'--Llene el grupo--')  )  ;	?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
					echo $form->DropDownList($model,'codresponsable',$datos, array('empty'=>'--Seleccione un responsable--')  )
					?>
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'codteniente'); ?>
		<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
					echo $form->DropDownList($model,'codteniente',$datos, array('empty'=>'--Apoderado--')  )
					?>
		<?php echo $form->error($model,'codteniente'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'texv'); ?>
		<?php echo $form->textArea($model,'texv',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'docref'); ?>
		<?php echo $form->textField($model,'docref',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'docref'); ?>
	</div>

	</div>
	</div>
</fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Actualizar'); ?>
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