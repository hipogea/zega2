<?php
/* @var $this MotController */
/* @var $model Mot */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mot-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	
	<?PHP 
   
/*$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
									
									'Zarpe'=>array('id'=>'tab_zarpe',
															
														'content'=>$this->renderPartial('llena_materiales', array('model'=>$model,'form'=>$form,'naleatorio'=>$naleatorio,),TRUE)
																			),
									'Motor y caja'=>array('id'=>'tab_motorycaja',
														'content'=>$this->renderPartial('vf', array('model'=>$model,'form'=>$form,),TRUE)
																			),
									
									),
								 
    // additional javascript options for the tabs plugin
					'options' => array(	'collapsible' => false,
											'heightStyle'=>'content',
										),
    // set id for this widgets
					'id'=>'MyTab',
												)
			);*/

   $this->renderPartial('llena_materiales', array('model'=>$model,'form'=>$form,'naleatorio'=>$naleatorio,),false);
														
		
		 
		 
?>

 
 <?php
 $this->renderPartial('detalle', array('model'=>$model,'naleatorio'=>$naleatorio));   
	
	?>
	
	
	
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>500,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

<?php 

 $createUrl = $this->createUrl('/motmatdet/create',
										array(
										        //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'mot-mat-det-grid',
												//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),
												"naleatorio"=>$naleatorio,
											)
							);
echo CHtml::button("+",array('title'=>"+",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 

?>
	
	
	
	
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->