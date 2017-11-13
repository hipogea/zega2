<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventario-form',	
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
                
		$botones=array(

			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array($this::ESTADO_ENACTIVIDAD,$this::ESTADO_FUERAOPERACION,$this::ESTADO_TRAMITEBAJA,$this::ESTADO_ARCHIVO),
			),


			'bomb'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->idinventario,'ev'=>2)),//apreuba guia
				'visiblex'=>array($this::ESTADO_ENACTIVIDAD,$this::ESTADO_FUERAOPERACION,$this::ESTADO_TRAMITEBAJA,$this::ESTADO_ARCHIVO),
			),
			'tacho'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->idinventario,'ev'=>35)),//anula guia
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

			'out'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/salir',array('id'=>$model->idinventario)),
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

















	<div class="panelizquierdo">
	
	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
	<?php  
	$documento='390';
		$criteria = new CDbCriteria;
		$criteria->condition='codocu=:docu';
		$criteria->params=array(':docu'=>$documento);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		 $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
		 				 echo $form->DropDownList($model,'codestado',$datos, array('empty'=>'--Indique el status--', 'disabled'=>'disabled')  )  ;	?>
	<?php echo $form->error($model,'codestado'); ?>
	</div>




		<div class="row">
			<?php echo $form->labelEx($model,'tipo'); ?>
			<?php
			$datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');
			echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
			<?php echo $form->error($model,'tipo'); ?>
		</div>


		<div class="row">
		<?php echo $form->labelEx($model,'codep'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codep',$datos1, array('empty'=>'--Seleccione una ep--')  )  ;
		?>
		<?php echo $form->error($model,'codep'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'codeporiginal'); ?>
		<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
		<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
		  echo $form->DropDownList($model,'codeporiginal',$datos1, array('empty'=>'--Seleccione una ep--')  )  ;
		?>
		<?php echo $form->error($model,'codeporiginal'); ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codepanterior'); ?>
			<?php //echo $form->textField($model,'codep',array('size'=>3,'maxlength'=>3)); ?>
			<?php  $datos1 = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
			echo $form->DropDownList($model,'codepanterior',$datos1, array('empty'=>'--Seleccione una ep--')  )  ;
			?>
			<?php echo $form->error($model,'codepanterior'); ?>
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
		<?php echo $form->textField($model,'codigosap',array('size'=>6,'maxlength'=>6, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codigosap'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoaf'); ?>
		<?php
				/*$form->widget('CMaskedTextField', array(
				'model' => $model,
				'attribute' => 'codigoaf',
				'mask' => '99-9999-999999',
				'htmlOptions' => array('size' => 13,'value'=>$model->isNewRecord ?'':$model->codigoaf)
						));*/
				?>
		<?php echo $form->textField($model,'codigoaf',array('size'=>14,'maxlength'=>14, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'codigoaf'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>15,'maxlength'=>15, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>
	
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>


		<div class="row">
			<?php if(strlen(trim($model->codmaster))>0){ ?>
			<?php echo $form->labelEx($model,'codmaster'); ?>
			<?php echo $form->textField($model,'codmaster',array('style'=>'font-size: 13px; color:#993366; font-weight:bold; ','size'=>8,'maxlength'=>8, 'disabled'=>'disabled')); ?>
			<?php echo CHTml::textField('dfdf',Masterequipo::findByCodigo($model->codmaster)->descripcion,array('style'=>'font-size: 13px; color:#993366; font-weight:bold; ','size'=>25,'maxlength'=>25, 'disabled'=>'disabled')); ?>
			<?php } ?>

		</div>

	</div>
	
	<div class="panelderecho">
	
	<div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>20,'maxlength'=>20, 'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'serie'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model'=>$model,
				'attribute'=>'fecha',
				'value'=>$model->fecha,
				'language'=>'es',
					// additional javascript options for the date picker plugin
				'options'=>array(
				'showAnim'=>'fold',
				'showButtonPanel'=>true,
				'autoSize'=>true,
				'dateFormat'=>'yy-mm-dd',
					'defaultDate'=>$model->fecha)));
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coddocu'); ?>
		<?php  $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		  echo $form->DropDownList($model,'coddocu',$datos, array('empty'=>'--Seleccione un documento--')  )  ;
		?>
		<?php echo $form->error($model,'coddocu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numerodocumento'); ?>
		<?php echo $form->textField($model,'numerodocumento',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numerodocumento'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'codlugar'); ?>
		<?php  $datos = CHtml::listData(Lugares::model()->findAll(array('order'=>'deslugar')),'codlugar','deslugar');
		  echo $form->DropDownList($model,'codlugar',$datos, array('empty'=>'--Seleccione un Lugar--', 'disabled'=>'disabled')  )  ;
		?>
		<?php echo $form->error($model,'codlugar'); ?>
		</div>
	

	
	


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Grabar'); ?>
	</div>

	
	</div>
<?php $this->endWidget(); ?>



</div><!-- form -->
</div>
</div>
	<?php
	/*$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'detalle-grid',
		'dataProvider'=>Componentes::model()->search_por_activo($model->idinventario),
		//'filter'=>$model,
		//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
		//'summaryText'=>'',
		'columns'=>array(
			array(
				'class'=>'CCheckBoxColumn',
				'selectableRows' => 20,
				'value'=>'$data->id',
				'checkBoxHtmlOptions' => array(
					'name' => 'cajita[]',
					//'enabled'=>'(($data->coddocu=="001") and ($data->codpro <> "R00001"))?"false":"true"',
					//'disabled'=>'true',
				),
				// 'id'=>'cajita' // the columnID for getChecked
			),
			'codmaster',
			'master.descripcion',
			'lugares.deslugar',
		),
	));*/ ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
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