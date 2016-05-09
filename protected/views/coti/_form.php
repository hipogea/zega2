<?php
/* @var $this CotiController */
/* @var $model Coti */
/* @var $form CActiveForm */
?>

<div class="wide form">

	
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coti-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
      'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>true,
	
)); ?>



	<?php echo $form->errorSummary($model); ?>

<?php
//construyendo el array de las opciones del menu en base al array de los eventos segun el estado actual del dccumento
$acciones=Eventos::model()->findAll("codocu='".$model->coddocu."' AND  estadoinicial= '".$model->codestado."' ");
 $botones=array();
 $aux=array();
 foreach ( $acciones as  $clave => $valor) {
 					 $aux=array('label'=>$valor['descripcion'],
 					 			 'icon-position'=>'left',
 					 			 'icon'=>'check',
 					 			 'url'=>array('procesarguia','id'=>$model->idguia,'ev'=>$valor['id'])
 					 			 ); //pasando los parametros id guia e id evento para procesar

 						array_push($botones,$aux);
 					 $aux=array();

 			}


  $this->widget('ext.JuiButtonSet.JuiButtonSet', array(
    'items' => $botones,
    'htmlOptions' => array('style' => 'clear: both;'),
));

   ?>

<?php
$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
									'Inicio'=>array('id'=>'tab_motorycaja',
														'content'=>$this->renderPartial('tab_uno', array('form'=>$form,'model'=>$model),TRUE)
																			),
									'Comerciales'=>array('id'=>'tab_motorycaja2',
														'content'=>$this->renderPartial('tab_dos', array('form'=>$form,'model'=>$model),TRUE)
																			),
									'Adicionales'=>array('id'=>'tab_motorycaja3',
														'content'=>$this->renderPartial('tab_tres', array('form'=>$form,'model'=>$model),TRUE)
																			),
									),
								 
    // additional javascript options for the tabs plugin
					'options' => array(	'collapsible' => false,),
    // set id for this widgets
					'id'=>'MyTabi',
												)
			);



?>
















	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Grabar',array('class'=>'botoncito')); ?>
	</div>














<?php

 if ( !$model->isNewRecord )  {
				  
				$this->renderpartial('vw_detalle',array('eseditable'=>$this->eseditable($model->codestado),'filtro'=>$model->idguia));  
				  
				}



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

if ($this->eseditable($model->codestado)=='')
		
						{
 $createUrl = $this->createUrl('/coti/creadetalle',
										array(
										       "idcabeza"=>$model->idguia,
										       "cest"=>$model->codestado,
											   //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'detalle-grid',
												//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),
												
											)
							);
 $UrlDefault = $this->createUrl('/guia/defaulte');
echo CHtml::button("   +   ",array('title'=>"Agregar Item",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 
ECHO CHtml::ajaxSubmitButton('   -   ',array(
												'coti/borraitems',												 
												),
											array('success'=>'reloadGrid',
												 
												  ),
											array(
												 'confirm'=>'Esta seguro de borrar los items seleccionados ?',
												  )
											/*array(
												 'beforeSend'=>'function() {        
 																			$("#resPass").html("please wait......");

     																	   }',
												  ),
											array(
													'complete' => 'function() {
      																		$("#resPass").hide();
     																					}', 
												)
												*/ 
 													
 							);

					}


?>
	<?php
	   
	$this->renderpartial('vw_resumen',array('id'=>($model->isNewRecord)?0:$model->idguia,'monedas'=>'$','descuento'=>($model->isNewRecord)?0:$model->descuento));  
	 
	
		?>

</div><!-- form -->
<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
function reloadGrid(data) {
	 $.fn.yiiGridView.update('detalle-grid');
    $.fn.yiiGridView.update('resumen-grid');
	alert(' '+data+ ' ');
}
</script>














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