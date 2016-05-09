
<span class="summary-icon2">
           <img src="<?php echo Yii::app()->theme->baseUrl ;?>/img/caja1.png" width="25" height="25" alt="">
</span>

<h1><?php echo ($habilitado=="")?'Actualizar ':'Visualizar '; ?>material <?php echo $model->codigo; ?></h1>


<div class="division">
<div class="wide form">


	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'maestrodetalle-form',
		'enableClientValidation'=>true,
		'clientOptions' => array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>true
		),
		'enableAjaxValidation'=>false,
	)); ?>


	<?php echo $form->errorSummary(array($model,$modelodetalle,$modelodetallecentro)); ?>
<div class="row">
		<?php
          if($habilitado=="") { ?>
			  <div class="row">
				  <?php

				  $this->widget('ext.toolbar.Barra',
					  array(
						  'botones'=>array(
							  'save'=>array(
								  'type'=>'A',
								  'ruta'=>array(),
								  'visiblex'=>array(null,'','99','10','20'),
							  )

						  ),
						  'size'=>24,
						  'extension'=>'png',

					  )
				  );?>

			  </div>
        <?php  }
        
          ?>

		

	</div>











<?PHP 

   
$this->widget('zii.widgets.jui.CJuiTabs', array(
					'tabs' => array(
									
									'Generales'=>array('id'=>'tab_general',
														'content'=>$this->renderPartial('tab_general', array('habilitado'=>$habilitado,'model'=>$model,'form'=>$form),TRUE)
																			),
									'Almacen'=>array('id'=>'tab_detalle',
														'content'=>$this->renderPartial('tab_detalle', array('model'=>$model,'habilitado'=>$habilitado,'modelodetallecentro'=>$modelodetallecentro,'modelodetalle'=>$modelodetalle,'form'=>$form),TRUE)
																			),
											'Centro'=>array('id'=>'tab_centro',
											'content'=>$this->renderPartial('tab_centro', array('habilitado'=>$habilitado,'model'=>$model,'modelodetallecentro'=>$modelodetallecentro,'form'=>$form),TRUE)
											),
						             'Conversiones'=>array('id'=>'tab_conversiones',
														'content'=>$this->renderPartial('vw_conversiones', array('habilitado'=>$habilitado,'model'=>$model),TRUE)
																			),
									),
								 
    // additional javascript options for the tabs plugin
					'options' => array(	'collapsible' => false,),
    // set id for this widgets
					'id'=>'MyTabi',
												)
			);

?>
	
<div class="row">

  <?php
  	echo $form->hiddenField($model,'escompletar', array( 'value'=>'no'));
  ?>

  <?php
  	echo $form->hiddenField($model,'alam', array( 'value'=>$modelodetalle->codal));
  ?>

  <?php
  	echo $form->hiddenField($model,'codcent', array( 'value'=>$modelodetalle->codcentro));
  ?>
   <?php
  	echo $form->hiddenField($model,'codigox', array( 'value'=>$model->codigo));
  ?>
  
  
  

</div>
  

<?php $this->endWidget(); ?>

</div><!-- form -->
		 

</DIV> 

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>