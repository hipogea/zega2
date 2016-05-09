<?PHP
$this->menu=array(
//array('label'=>'Liberacion masiva', 'url'=>array('libmasiva')),
array('label'=>'Modificar', 'url'=>array('editarmaterial','id'=>$model->codigo)),
	array('label'=>'Listado', 'url'=>array('admin')),
//array('label'=>'Valores por defecto', 'url'=>array('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),
); ?>

<?PHP
MiFactoria::titulo('Visualizar material','color_swatch_2')
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
	'enableAjaxValidation'=>FALSE,
)); ?>
	<div class="row">
		<?php
		$botones=array(
			'edit' => array(
				'type' => 'B',
				'ruta' => array($this->id . '/editarmaterial',array('id'=>$model->codigo)),
				'visiblex' => array('10'),
			),

			'out' => array(
				'type' => 'B',
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
<?php $habilitado='disabled'; ?>
<div class="panelizquierdo">

	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php echo CHtml::textField('codtipox',$model->maestro_maestrotipos->destipo,array('disabled'=>'disabled')); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>4,'maxlength'=>4, 'disabled'=>$habilitado)); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>35,'maxlength'=>40, 'disabled'=>$habilitado)); ?>

	</div>
	<DIV ID="imagenmaterial" >
		<?php

		/* echo CHtml::image(
              "/recurso/materiales/".$model->codigo.".jpg"
          ,"",
          array('width'=>'240','height'=>'240')

          );*/

		?>

	<div class="row">
		<?php echo $form->labelEx($model,'esrotativo'); ?>
		<?php
		echo $form->CheckBox($model,'esrotativo',array('disabled'=>$habilitado)) ;
		?>
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
		<?php echo CHtml::textField('codtipoxd',$model->maestro_ums->desum,array('disabled'=>'disabled')); ?>
		<?php  echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),
			CController::createUrl($this->id.'/muestraums'), array(
				'type' => 'POST',
				'url' => CController::createUrl($this->id.'/muestraums'), //  la acci?n que va a cargar el segundo div
				"data"=>array(

					"codigomaterial"=>$model->codigo,
				),
				"update" => "#detalle",
			)

		);?>
	</div>
	





	<div class="row">

		<div style="width:200px;float:right;">
			<?php echo "Ampliaciones <br>"; ?>
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
					ARRAY('name'=>'codal','type'=>'raw','value'=>'CHtml::Ajaxlink(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"),$this->grid->controller->createUrl("/Maestrocompo/muestradetalle", array()), array("type"=>"GET","data"=>array("centro"=>$data->codcentro,"codigo"=>$data->codart,"codal"=>$data->codal),"update"=>"#detalle" ) )'),

				),
			)); ?>

		</div>
		<div style="width:180px;float:right;">
			<?php echo "Imagen <br>"; Numeromaximo::Pintaimagen(Yii::app()->params['rutaimagenesmateriales'].$model->codigo.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",120,120); ?>

		</div>

	</div>
	</div></div>


   <div class="panelderecho">
   <div id="detalle">


   </div>




</div>







<?php $this->endWidget(); ?>

</div><!-- form -->


</div>







<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Kardex',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>500,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>