<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>
<div style="overflow:auto;">
<div class="division">
<div class="wide form">
	<?php $this->widget('ext.loading.LoadingWidget'); ?>
 <?php  
 
 $modelopadre=OT::model()->findByPk($idcabeza);
 if(is_null($modelopadre) )
 throw new CHttpException(500,'No se encontro ninguna Solicitud con ese ID');
 $habilitado='';


  ?>

		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>TRUE,
			'clientOptions' => array(
				'validateOnSubmit'=>TRUE,
				'validateOnChange'=>TRUE  ,
			),
	'enableAjaxValidation'=>FALSE,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>


	<?php echo $form->hiddenField($model,'hidot',array('value'=>$idcabeza)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'hidlabor'); ?>
		<?php
		$criteria = new CDbCriteria();
		$criteria->addCondition("idusertemp=:vuser and hidorden=:vorden");
		$criteria->params = array(":vorden"=>$modelopadre->id,":vuser"=>yii::app()->user->id);
		?>
		<?php  $datos1t1 = CHtml::listData(Tempdetot::model()->findAll($criteria),'idaux','textoactividad');
		//var_dump(Tempdetot::model()->findAll("idusertemp=:vuser and hidorden=:vorden",array(":vorden"=>$modelopadre->id,":vuser"=>yii::app()->user->id)));
		// $datos1t1 = CHtml::listData(Tempdetot::model()->findAll("idusertemp=:vuser ",array(":vuser"=>yii::app()->user->id)),'id','textoactividad');
		//	var_dump($datos1t1);
		echo $form->DropDownList($model,'hidlabor',$datos1t1, array('empty'=>'--Seleccione una labor--','disabled'=>$this->eseditable($modelopadre->codestado))  )  ;
		?>
		<?php echo $form->error($model,'hidlabor'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codservicio'); ?>
		<?php $this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codservicio',
			//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
			'ordencampo'=>2,
			'controlador'=>'Desolpe',
			'relaciones'=>$model->relations(),
			'tamano'=>8,
			//'habilitado'=>true,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'miffuufdffu',
			//'nombrecampoareemplazar'=>'descripcion',
			//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
		));
		?>

		<?php echo $form->error($model,'codservicio'); ?>

	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Um--', 'disabled'=>$habilitado, 'maxlength'=>4)  )  ;
 ?>
		<?php echo $form->error($model,'um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'txtmaterial'); ?>
		<?php echo $form->textField($model,'txtmaterial',array('size'=>40,'maxlength'=>40, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'txtmaterial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punitplan'); ?>
		<?php echo $form->textField($model,'punitplan',array('size'=>8,'maxlength'=>8, 'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'punitplan'); ?>
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
												'showOn'=>'both', // 'focus', 'button', 'both'
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
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
		<?php echo $form->labelEx($model,'textodetalle'); ?>
		<?php echo $form->textArea($model,'textodetalle',array( 'disabled'=>$habilitado,'rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'textodetalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'solicitanet'); ?>
		<?php echo $form->textField($model,'solicitanet',array( 'disabled'=>$habilitado,'size'=>25,'maxlenght'=>25)); ?>
		<?php echo $form->error($model,'solicitanet'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo ($habilitado=='')?CHtml::submitButton(($model->isNewRecord)?'Agregar' : 'Actualizar',array('onClick'=>'Loading.show();Loading.hide();')):''; ?>
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
</div>
</div>
