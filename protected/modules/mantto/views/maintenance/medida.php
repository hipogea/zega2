<?php
/* @var $this InventarioController */
/* @var  $padre Inventario */
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
   
	<?php echo $form->errorSummary( $padre); ?>

<div class="row">
		<?php
               
		$botones=array(

			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array(true),
                                    ),

			
			
                    
                     'camera' => array(
                            'type' => 'C',
                            'ruta' => array($this->id.'/tomafoto', array(
                               // 'id' =>  $padre->idinventario,                                    
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog3',
                            'frame' => 'cru-frame3',
                           'visiblex'=>array(true),

                        ),

			
		);
                 //echo "salio"; die();
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar( $padre->id,$this->documento, $padre->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',
			)
		);?>
	</div>
     
  <div class="panelizquierdo">
             

	 <div class="row">
		<?php echo $form->labelEx( $padre,'codigo'); ?>
		<?php echo $form->textField( $padre,'codigo',array('size'=>5,'maxlength'=>5)); ?>
		
	</div>
	 <div class="row">
		<?php echo $form->labelEx( $padre,'ubicacion'); ?>
		<?php echo $form->textField( $padre,'ubicacion',array('size'=>30,'maxlength'=>40)); ?>
		
	</div>
	
	 <div class="row">
		<?php echo $form->labelEx( $padre,'lecturainicio'); ?>
		<?php echo $form->textField( $padre,'lecturainicio',array('size'=>15,'maxlength'=>15)); ?>
		
	</div>

	 <div class="row">
		<?php echo $form->labelEx( $padre,'lecturaacumulada'); ?>
		<?php echo $form->textField( $padre,'lecturaacumulada',array('size'=>25,'maxlength'=>25)); ?>
		
	</div>
	
	<div class="row">
		<?php echo $form->labelEx( $padre,'fechainicio'); ?>
		<?php echo $form->textField( $padre,'fechainicio',array('size'=>14,'maxlength'=>14)); ?>
		
	</div>
      
      <div class="row">
		<?php echo $form->labelEx( $padre,'unidades'); ?>
		<?php echo $form->checkBox( $padre,'unidades');?>
		
	</div>	
	  </div>
	

	<div class="panelderecho">
	 <div class="row">
		<?php echo $form->labelEx( $model,'fecha'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'fecha', //attribute name
					'language'=>'es',
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
					'options'=>array('dateFormat'=>'dd/mm/yy',
							'showOn'=>'button', // 'focus', 'button', 'both'
                                                        'buttonText'=>Yii::t('ui',' ... '),
							//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
							//'buttonImageOnly'=>true,
								),
				'htmlOptions'=>array(
			       'style'=>'width:150px;vertical-align:top',
                                    'readonly'=>'readonly',

					),// jquery plugin options

				));

			?>
             <?php echo $form->error( $model,'fecha'); ?>
	</div>
            <div class="row">
		<?php echo $form->labelEx( $model,'lectura'); ?>
		<?php echo $form->textField( $model,'lectura',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error( $model,'lectura'); ?>
		
	</div>
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