

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalleoc-form',

	//'enableAjaxValidation'=>true,
	



)); ?>
<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
	$botones = array(
	'save' => array(
	'type' => 'A',
	'ruta' => array(),
	'visiblex' => array('10'),
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
		);

	?>
</div>

        <div class="row">
		<?php echo $form->labelEx($model,'hidreg'); ?>
		<?php  $datos1tb1 = CHtml::listData(Regimen::model()->findAll(),'id','desregimen');
		echo $form->DropDownList($model,'hidreg',$datos1tb1, array('empty'=>'--Seleccione un regimen--')  )  ;
		?>
		<?php echo $form->error($model,'hidreg'); ?>
	</div>
    
    
     <div class="row">
		<?php echo $form->labelEx($model,'codof'); ?>
		<?php  $datos1tb1x = CHtml::listData(Oficios::model()->findAll(),'codof','oficio');
		echo $form->DropDownList($model,'codof',$datos1tb1x, array('empty'=>'--Seleccione un oficio--')  )  ;
		?>
		<?php echo $form->error($model,'codof'); ?>
	</div>
    

   
    
	

	<div class="row">
		<?php echo $form->labelEx($model,'tarifa'); ?>
		<?php echo $form->textField($model,'tarifa',array('size'=>7)); ?>
		<?php echo $form->error($model,'tarifa'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>

		<?php echo $form->DropdownList($model,'codmon',$datos,array('empty'=>'--Seleccione moneda--')); ?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

    
   
	<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
