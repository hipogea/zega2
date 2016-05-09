<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'itemsolpe-form',
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true
     ),
	'enableAjaxValidation'=>FALSE,
	



)); ?>
	<?php echo $form->errorSummary($model); ?>
  <?php
	$this->widget('ext.matchcode1.MatchCode1',array(
	'nombrecampo'=>'numero',
	//'campoex'=>'numero',
	'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
	'ordencampo'=>0,
	'controlador'=>'Solpe',
	'relaciones'=>$model->relations(),
	'tamano'=>12,
	'model'=>$model,
	'form'=>$form,
	'nombredialogo'=>'cru-dialog3',
	'nombreframe'=>'cru-frame3',
	'nombrearea'=>'miffuufudfdg',
	'nombrecampoareemplazar'=>'numero',
	//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
	));
	?>



<div class="row">

						<?php echo $form->labelEx($model,'numero'); ?>
						<?php
						$opajax=array(
							'type'=>'POST',
							'url'=>Yii::app()->createUrl('/Ocompra/sacaitem'
							),
							//'data'=>array('itemx'=>"js:Solpe_item.value"),
							'update'=>"#Solpe_item",
						) ;
							echo $form->textField($model,'numero',array('ajax'=>$opajax,'size'=>10,'maxlength'=>10));
						?>

						<?php echo $form->error($model,'numero'); ?>
	
</div>


	<div class="row">

		<?php echo $form->labelEx($model,'item'); ?>
		<?php
		$opajax2=array(
			'type' => 'POST',
			  'data'=>array('idsolpex'=>'js:this.value'),
			'url' => CController::createUrl('ocompra/sacaum'), //  la acción que va a cargar el segundo div
			'update' => '#Docompratemp_um' // el div que se va a actualizar
		);


		echo $form->dropDownlist($model,'item',array(),array('ajax'=>$opajax2,'empty'=>'--Seleccione Um--'));?>

		<?php echo $form->error($model,'item'); ?>

	</div>

	<div class="row">

		<?php echo $form->labelEx($modelocompra,'um'); ?>
		<?php  $datos = array();
		echo $form->DropDownList($modelocompra,'um',$datos, array('empty'=>'--Seleccione un item--')  )  ;	?>
		<?php echo $form->error($modelocompra,'um'); ?>

	</div>

	<div class="row">

		<?php echo $form->labelEx($modelocompra,'cant'); ?>
		<?php
		echo $form->textField($modelocompra,'cant'  )  ;	?>
		<?php echo $form->error($modelocompra,'cant'); ?>

	</div>



	<div class="row buttons">
		<?php CHtml::submitButton('Agregar',array('onClick'=>'Loading.show();Loading.hide();')) ?>
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