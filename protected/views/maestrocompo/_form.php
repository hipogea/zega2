<?PHP
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'maestrocompo-form',
		'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
<?php
$habilitado=($model->isNewRecord ? '' : 'Disabled')
//echo $habilitado;
?>

	<div class="row">
		<?php
		$botones=array(

			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
			'add' => array(
				'type' => 'D', //AJAX LINK
				'ruta' => array('Maestrocompo/ampliarmaterial', array('centro' => 'js:Maestrocompo_codcent','almacen' =>'js:Maestrocomp.alam','codigo' =>$model->codigo	)),
				'opajax' => array(
					'type' => 'POST',
					'ruta' => array('Maestrocompo/ampliarmaterial',
						array(		'centro' => 'js:Maestrocompo_codcent',
									'almacen' =>'js:Maestrocomp.alam',
									'codigo' =>$model->codigo,
							)
									),
					'update' => '#zona_pdf',

				),
				'visiblex'=>array('10'),
			),


			'out'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/admin',array()),
				'visiblex'=>array('10'),
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
<div class="panelizquierdo">
	
	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php  $datos = CHtml::listData(Maestrotipos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'codtipo',$datos,array('empty'=>'--Seleccione Tipo--', 'disabled'=>$habilitado) ) ;
		?>
		<?php echo $form->error($model,'codtipo'); ?>
	</div>
     <?php
if(yii::app()->hasModule('ventas')){ ?>
    <?php echo $form->labelEx($model,'tipogrupoventa'); ?>
       <?php   $datosx = CHtml::listData(VentasTipoproducto::model()->findAll(),'codtipo','destipo'); ?>
    <?php echo $form->DropDownList($model,'tipogrupoventa',$datosx, array('empty'=>'--Llene el grupo de ventas--')  )  ; ?>
<?php }   ?>
	<div class="row">
		<?php echo $form->labelEx($model,'esrotativo'); ?>
		<?php
		echo $form->CheckBox($model,'esrotativo',array('disabled'=>$habilitado)) ;
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
		<?php echo $form->labelEx($model,'um'); ?>
		<?php 
$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
echo $form->DropDownList($model,'um',$datos, array('empty'=>'--Unidad de medida--', 'disabled'=>$habilitado)  )  ;						     
 ?>
		<?php echo $form->error($model,'um'); ?>
	</div>
	

     <div class="row">
		<?php echo $form->labelEx($model,'codcent'); ?>
		<?php 
			
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codcent',
												'ordencampo'=>2,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fhdfj',
													));
													
		
								
			   ?>
	
			
			<div style='float: left;'>
					<?php echo $form->error($model,'codcent'); ?>
			</div>
      </div>


     <div class="row">
		<?php echo $form->labelEx($model,'alam'); ?>
		<?php 
			
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'alam',
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fdddddhdfj',
													));
													
		
								
			   ?>
	
			
			<div style='float: left;'>
					<?php echo $form->error($model,'alam'); ?>
			</div>
      </div>

 <div class="row">

  <?php
  	echo $form->hiddenField($model,'escompletar', array( 'value'=>'si'));
  echo $form->hiddenField($model,'codigo');
  ?>
</div>

	<?php $this->endWidget(); ?>











</div>




   <div class="panelderecho">

	   <?php $form=$this->beginWidget('CActiveForm', array(
		   'id'=>'maestrocompo-form2',
		   'enableClientValidation'=>TRUE,
		   'clientOptions' => array(
			   'validateOnSubmit'=>true,
			   'validateOnChange'=>true
		   ),
		   'enableAjaxValidation'=>false,
	   )); ?>
<?php
  if(!$model->isNewRecord ) {
  $ruta='materiales'.DIRECTORY_SEPARATOR;
    $this->widget('ext.coco.CocoWidget'
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
            'methodName'=>'FileReceptor',
            'userdata'=>$model->codigo,
            // controls how many files must be uploaded
            'maxUploads'=>-1, // defaults to -1 (unlimited)
            'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
            // controls how many files the can select (not upload, for uploads see also: maxUploads)
            'multipleFileSelection'=>true, // true or false, defaults: true
            //'nombrealt'=>$model->codigo.'',
        ));

}
    ?>



<div class="row">
<DIV ID="imagenmaterial" >
  <?php 
  
 /* echo CHtml::image(
  	"/recurso/materiales/".$model->codigo.".jpg"
  ,"",
  array('width'=>'240','height'=>'240')

  );*/
  Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$model->codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",240,240)

  ?>


  </DIV>
</div>
	   <div class="row buttons">
		   <?php echo (!$model->isNewRecord)?CHtml::ajaxSubmitButton("Borrar Imagen.",
			   array("Maestrocompo/borraimagen"),
			   array("type"=>"POST",
				   "data"=>array(
					   "codiguito"=>"js:Maestrocompo_codigo.value",

				   ),
				   "update" => "#imagenmaterial",

			   )
		   ):""; ?>
	   </div>
	   <?php $this->endWidget(); ?>


</div> <!--  FIn del panel derecho      !-->








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
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
</div>
