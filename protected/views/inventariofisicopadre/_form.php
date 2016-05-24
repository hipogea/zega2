<?php
/* @var $this InventariofisicopadreController */
/* @var $model Inventariofisicopadre */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="form">
	<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventariofisicopadre-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

		<div class="row">
		<?php
		$botones = array(
		'save' => array(
		'type' => 'A',
		'ruta' => array(),
		'visiblex' => array('10'),
		),



		'checklist' => array(
		'type' => 'D', //AJAX LINK
		'ruta' => array($this->id.'/generadetalle', array('id' => $model->id)),
		'opajax' => array(
		'type' => 'POST',
		'ruta' => array($this->id.'/generadetalle', array('id' => $model->id)),
		'complete' => 'function(){
		     $.fn.yiiGridView.update("detalle-grid");
		}'
		),
		/*'success'=>'function(data) {
		$("#myDivision").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
		}'
		),*/
		'visiblex' => array('10'),

		),

			'pack2'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/descargainventario',array('id'=>$model->id,'exportacion'=>1)),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array('10'),

			),

			'upload'=>array(
				'type'=>'C',
				'ruta'=>array('cargamasiva/import',array(
					'id'=>$model->hidcarga,
					'asDialog'=>1)

							),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array('10'),

			),

			'refresh'=>array(
				'type'=>'F',
				'ruta'=>array(),
				'visiblex'=>array('10'),

			),

			'pack1'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/cierraconteo',array('id'=>$model->id)),
				'visiblex'=>array('10'),

			),


		);

		/*VAR_DUMP($model->{$this->campoestado});
		YII::APP()->END();*/
		$this->widget('ext.toolbar.Barra',
		array(
		//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
		'botones'=>$botones,
		'size'=>24,
		'extension'=>'png',
		'status'=>'10',

		)
		);
		// var_dump($model->{$this->campoestado}); var_dump(ESTADO_CREADO);var_dump($model->numeroitems+0);die();

		?>
	</div>
		<?php echo $form->errorSummary($model); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Inicio'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_principal', array('form'=>$form,'model'=>$model),TRUE)
					),

					'Carga Archivo'=>array('id'=>'tab__',
						'content'=>$this->renderPartial('tab_carga', array('model'=>$model),TRUE)
					),

					'Auditoria'=>array('id'=>'tab_._',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),

					'Listado'=>array('id'=>'tab_._k',
						'content'=>$this->renderPartial('tab_listado', array('modelhijo'=>$modelhijo,'model'=>$model),TRUE)
					),



				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>




<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>

<?PHP




?>



<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'Item',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>600,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

