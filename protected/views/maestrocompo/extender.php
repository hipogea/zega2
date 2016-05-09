<?php
$this->menu=array(
//array('label'=>'List Maestrocompo', 'url'=>array('index')),
array('label'=>'Crear material', 'url'=>array('create')),
//array('label'=>'View Maestrocompo', 'url'=>array('view', 'id'=>$model->id)),
array('label'=>'Listado materiales', 'url'=>array('admin')),
);
?>

<?php MiFactoria::titulo('Extender material '.(!is_null($maestrodetalle->codart))?$maestrodetalle->codart:$maestrodetallecentro->codart,'package')   ?>


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
	<?php echo $form->errorSummary($model); ?>
<?php
$habilitado=($model->isNewRecord ? '' : 'Disabled')
//echo $habilitado;
?>

<div class="panelizquierdo">
	
	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php
		  echo CHTml::textField('cdotipoxx',$model->maestro_maestrotipos->destipo,array('disabled'=>$habilitado) ) ;
		?>

	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'esrotativo'); ?>
		<?php
		echo $form->CheckBox($model,'esrotativo',array('disabled'=>$habilitado)) ;
		?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40, 'disabled'=>$habilitado)); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>

	</div>

	
	
	<div class="row">
		<?php echo $form->labelEx($model,'nparte'); ?>
		<?php echo $form->textField($model,'nparte',array('size'=>35,'maxlength'=>35, 'disabled'=>$habilitado)); ?>

	</div>

	

	<div class="row">
		<?php
		echo CHTml::textField('cdotipoxfrx',$model->maestro_ums->desum,array('disabled'=>$habilitado) ) ;
		?>

	</div>
	


  </div> <!---fin del panel izquierdo !-->

   <div class="panelderecho">



<div class="row">
<DIV ID="imagenmaterial" >
  <?php 

  Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$model->codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",240,240)

  ?>


  </DIV>
</div>




</div> <!--  FIn del panel derecho      !-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear material' : 'Ampliar Material'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->



	<?php $formi=$this->beginWidget('CActiveForm', array(
		'id'=>'maestrodetallecc-form',
		'enableClientValidation'=>true,
		'clientOptions' => array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>true
		),
		'enableAjaxValidation'=>false,
	)); ?>



	<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
			'tabs' => array(
				'Almacen'=>array('id'=>'tab_detalle',
					'content'=>$this->renderPartial('tab_detalle', array('model'=>$model,'habilitado'=>$habilitado,'modelodetallecentro'=>$modelodetallecentro,'modelodetalle'=>$modelodetalle,'form'=>$form),TRUE)
				),
				'Centro'=>array('id'=>'tab_centro',
					'content'=>$this->renderPartial('tab_centro', array('model'=>$model,'habilitado'=>$habilitado,'modelodetallecentro'=>$modelodetallecentro,'form'=>$form),TRUE)
				),
			),
			'options' => array(	'collapsible' => false,),
			'id'=>'MyTabi',
		)
	);

	?>

	<?php $this->endWidget(); ?>
















