
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php
		$botones=array(
			'search'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
		);
		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		); ?>

	</div>
	    <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
				$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codart',												
												'ordencampo'=>1,
												'controlador'=>'VwStockSupervision',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione una referencia--',
													    ) ) ;
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>
	<div class="row">
		<? //php echo $form->labelEx($model,'color'); ?>
		<?//php  $datos17 = array(1=>'Deficit Stock',2=>'Optimo',3=>'Gestionar abastec',4=>'Sobre Stock');
		//echo $form->DropDownList($model,'color',$datos17, array('empty'=>'--Seleccione un status--',
		//) ) ;
		?>
		<?//php echo $form->error($model,'color'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, )); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>
       <div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>3,'maxlength'=>3, )); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div><!--divisaio -->

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>400,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>



	