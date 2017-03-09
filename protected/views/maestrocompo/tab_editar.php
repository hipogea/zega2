
<div class="division">
	<div class="wide form">
			<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestrocompo-form',
		'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
)); ?>
					<div class="row">
							<?php
								$botones=array(
								'save' => array(
								'type' => 'A',
								'ruta' => array(),
									'visiblex' => array('10'),
										),

									'checklist' => array(
										'type' => 'B',
										'ruta' => array(),
										'visiblex' => array('10'),
									),

									'out' => array(
				'						type' => 'B',
										'ruta' => array($this->id . '/admin',array()),
										'visiblex' => array('10'),
										),
										);
								$this->widget('ext.toolbar.Barra',
									array(
										//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
										'botones'=>$botones,
										'size'=>24,
										'extension'=>'png',
										'status'=>'10')); ?>

					</div>
	<?php $habilitado=''; ?>
						<div class="panelizquierdo">
									<div class="row">
												<?php echo $form->labelEx($model,'codtipo'); ?>
												<?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
													echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--', 'disabled'=>$habilitado) ) ;
												?>
												<?php echo $form->error($model,'codtipo'); ?>
									</div>
									<div class="row">
											<?php echo $form->labelEx($model,'esrotativo'); ?>
											<?php
//var_dump($model->maestro_docompra);die();
											echo $form->CheckBox($model,'esrotativo',array('disabled'=>(!$model->esmateriallibre())?'disabled':'')) ;
											?>
									</div>
									<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40, 'disabled'=>$habilitado)); ?>
<?php echo $form->error($model,'descripcion'); ?>
	</div>
									<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
<?php echo $form->textField($model,'marca',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>
<?php echo $form->error($model,'marca'); ?>
	</div>
									<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
<?php echo $form->textField($model,'modelo',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>
<?php echo $form->error($model,'modelo'); ?>
	</div>
									<div class="row">
		<?php echo $form->labelEx($model,'nparte'); ?>
<?php echo $form->textField($model,'nparte',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>
<?php echo $form->error($model,'nparte'); ?>
	</div>
									<div class="row">
		
<?php
$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--', 'disabled'=>($model->Sepuedecambiarum())?'':'disabled')  )  ;
?>

                                                                            
                                                                            <?php echo $form->labelEx($model,'um'); ?>


<?php  echo Chtml::Link(
	Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Conversion.png"),
	'#',
	array("onclick"=>'$("#cru-frame3").attr("src","'.Yii::app()->createurl('/maestrocompo/conversiones', array('codigo'=> $model->codigo,) ).'");$("#cru-dialog3").dialog("open"); return false;' )
  );?>


	</div>
									<div class="row" ID="detalleum">

	</div>
 			<?php $this->endWidget(); ?>

    <?php
if(yii::app()->hasModule('ventas')){ ?>
    <?php echo $form->labelEx($model,'tipogrupoventa'); ?>
       <?php   $datosx = CHtml::listData(VentasTipoproducto::model()->findAll(),'codtipo','destipo'); ?>
    <?php echo $form->DropDownList($model,'tipogrupoventa',$datosx, array('empty'=>'--Llene el grupo de ventas--')  )  ; ?>
<?php }   ?>

 <?php if($model->tienedetalle) {  ?>

								<div class="row">
									<div style="width:80px;float:left;">
										<?php  Echo CHTml::label('Instancias','sddg');    ?>
									</div>
										<div style="width:230px;float:left;">
														<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
													'id'=>'maestrocompo-grid',
													'itemsCssClass'=>'table table-striped table-bordered table-hover',
				// 'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
														'dataProvider'=>Maestrodetalle::model()->search_por_codigo($model->codigo),
				// 'filter'=>$model,
																	'summaryText'=>'',
														'columns'=>array(
					//'codigo',
														'codcentro',
														'codal',
															//ARRAY('name'=>'codal','type'=>'raw','value'=>'CHtml::Ajaxlink(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"),$this->grid->controller->createUrl("/Maestrocompo/muestradetalle", array()), array("type"=>"GET","data"=>array("centro"=>$data->codcentro,"codigo"=>$data->codart,"codal"=>$data->codal),"update"=>"#detalle" ) )'),
															ARRAY('name'=>'codal','type'=>'raw','value'=>'CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Edit.png"),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/maestrocompo/editadetalle\', array(\'codigo\'=> $data->codart,\'centro\'=> $data->codcentro,\'almacen\'=> $data->codal) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )'),

														),
															)); ?>

											</div>

								</div>
<?php }else {  ?>
	<?php } ?>

		</div>

		 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestrocompo-form23',
	'enableClientValidation'=>TRUE,
	'clientOptions' => array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true
	),
	'enableAjaxValidation'=>false,
)); ?>
   			<div class="panelderecho">

					<?php
									if(!$model->isNewRecord ) {
									$ruta='materiales'.DIRECTORY_SEPARATOR;
									$this->widget('ext.coco.CocoWidget'
                                                                       // $this->widget('ext.subefotos.SubeFotos'
										,array(
										'id'=>'cocowidget1',
										'onCompleted'=>'function(id,filename,jsoninfo){  }',
												'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
												'onMessage'=>'function(m){ alert(m); }',
														'allowedExtensions'=>array('JPEG','JPG','gif','PNG'), // server-side mime-type validated
												'sizeLimit'=>8000000, // limit in server-side and in client-side
											'uploadDir' => $ruta, // coco will @mkdir it
			// this arguments are used to send a notification
			// on a specific class when a new file is uploaded,
											'buttonText'=>'Subir Imagen',
											'receptorClassName'=>'application.models.Maestrocompo',
                                                                                       // 'modelin'=>  Tempdetot::model()->findByPk(187),
                                                                                       // 'modeli'=>23,
                                                                                    //'receptorClassName'=>'application.models.Tempdetot',
										'methodName'=>'FileReceptor',
                                                                                    //'methodName'=>'colocaarchivox',
											'userdata'=>$model->codigo,
			// controls how many files must be uploaded
												'maxUploads'=>-1, // defaults to -1 (unlimited)
												'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
			// controls how many files the can select (not upload, for uploads see also: maxUploads)
											'multipleFileSelection'=>false, // true or false, defaults: true
										//'nombrealt'=>$model->codigo.'',
											));

									}
								?>
										<div class="row">
													<DIV ID="imagenmaterial" >
  														<?php
																		Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$model->codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",240,240)
														?>
  													</DIV>
										</div>
	   				<div class="row buttons">
							<?php  echo Chtml::ajaxLink(
								"BORRAR IMAGEN",
									CController::createUrl($this->id.'/borraimagen'), array(
										'type' => 'POST',
											'url' => CController::createUrl($this->id.'/borraitems'), //  la acci?n que va a cargar el segundo div
												"data"=>array(

													"codiguito"=>$model->codigo,
															),
												"update" => "#imagenmaterial",
																							)

													);?>

	   						</div>
	   <?php $this->endWidget(); ?>
   <div id="detalle">
   </div>




</div>
	</div>
</div>








<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>850,
		'height'=>500,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

            