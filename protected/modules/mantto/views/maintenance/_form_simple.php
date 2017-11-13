<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventario-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
)); ?>
   
	<?php echo $form->errorSummary($model); ?>

<div class="row">
		<?php
                
		$botones=array(

			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array($this::ESTADO_ENACTIVIDAD,$this::ESTADO_FUERAOPERACION,$this::ESTADO_TRAMITEBAJA,$this::ESTADO_ARCHIVO),
			),


			
			
                    
                     'camera' => array(
                            'type' => 'C',
                            'ruta' => array($this->id.'/tomafoto', array(
                                'id' => $model->idinventario,                                    
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog3',
                            'frame' => 'cru-frame3',
                           'visiblex'=>array($this::ESTADO_ENACTIVIDAD,$this::ESTADO_FUERAOPERACION,$this::ESTADO_TRAMITEBAJA,$this::ESTADO_ARCHIVO),


                        ),

			
		);
                 //echo "salio"; die();
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>$model->{$this->campoestado},
			)
		);?>
	</div>
      <p class="note">Los campos marcados con asterisco( <span class="required">*</span>)  son obligatorios.</p>

	
  <div class="panelizquierdo">
	
	
			<?php 
			// esl estado es '01' POR DEFAULT '
			echo $form->hiddenField($model,'codestado',array('value'=>'10','border'=>0)); ?>



	  <div class="row">
		  <?php echo $form->labelEx($model,'tipo'); ?>
		  <?php 
		  $datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
		  <?php echo $form->error($model,'tipo'); ?>
	  </div>
	  
					<div class="row">
							<?php echo $form->labelEx($model,'codarea'); ?>
							<?php  $datos = CHtml::listData(Areas::model()->findAll(array('order'=>'area')),'codarea','area');
								echo $form->DropDownList($model,'codarea',$datos, array('empty'=>'--Seleccione un area--')  )  ;
								?>
							<?php echo $form->error($model,'codarea') ?>
					</div>
			
	



		<div class="row">
		<?php echo $form->labelEx($model,'codpropietario'); ?>
	<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codpropietario',$datos, array('empty'=>'--Llene el Propietario--'));
					?>
          <?php echo $form->error($model,'codpropietario'); ?>
	</div>
		
             

	 <div class="row">
		<?php echo $form->labelEx($model,'codigosap'); ?>
		<?php echo $form->textField($model,'codigosap',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codigosap'); ?>
	</div>
	 <div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>30,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	
	 <div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	 <div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'codigoaf'); ?>
		<?php echo $form->textField($model,'codigoaf',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'codigoaf'); ?>
	</div>
      
      <div class="row">
		<?php echo $form->labelEx($model,'tienecarter'); ?>
		<?php echo $form->checkBox($model,'tienecarter');?>
		<?php echo $form->error($model,'tienecarter'); ?>
	</div>	
	  </div>
	

	<div class="panelderecho">
			
	
	

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'serie'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'comentario',
                                    'htmlOptions'=>array('rows'=>25,'cols'=>50),
                                )
                            );?>
              <?php echo $form->error($model,'comentario'); ?>
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
        'width'=>300,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

</div>