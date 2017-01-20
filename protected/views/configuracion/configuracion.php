<?php
/* @var $this ConfiguracionController */
/* @var $model Settings */
/* @var $form CActiveForm */
?>



<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."config1.png");?> Configuracion</h1>



<div class="division">

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'settings-form',
		'enableClientValidation'=>true,
		'clientOptions' => array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>true
		),
		'enableAjaxValidation'=>false,

	)); ?>



	<?php //echo $form->errorSummary($model); ?>





	<?php
	$this->widget('zii.widgets.jui.CJuiTabs', array(
			'theme' => 'default',
			'tabs' => array(
				'General'=>array('id'=>'tab_',
					'content'=>$this->renderPartial('tab_general', array('form'=>$form,'model'=>$model),TRUE)
				),
				'Correo'=>array('id'=>'tab__',
					'content'=>$this->renderPartial('tab_correo', array('form'=>$form,'model'=>$model),TRUE)
				),
				'Inventario'=>array('id'=>'tab___s',
					'content'=>$this->renderPartial('tab_inventario', array('form'=>$form,'model'=>$model),TRUE)
				),
				'Compras'=>array('id'=>'tab____ss',
					'content'=>$this->renderPartial('tab_compras', array('form'=>$form,'model'=>$model),TRUE)
				),

				'Materiales'=>array('id'=>'tab_____x',
					'content'=>$this->renderPartial('tab_materiales', array('form'=>$form,'model'=>$model),TRUE)
				),

				'Activos'=>array('id'=>'tab______3',
					'content'=>$this->renderPartial('tab_activos', array('form'=>$form,'model'=>$model),TRUE)
				),

				'Transporte'=>array('id'=>'tab______i',
					'content'=>$this->renderPartial('tab_transporte', array('form'=>$form,'model'=>$model),TRUE)
				),
				'Colectores'=>array('id'=>'tab______o',
					'content'=>$this->renderPartial('tab_colectores', array('form'=>$form,'model'=>$model),TRUE)
				),
				'Documentos'=>array('id'=>'tab___b___o',
					'content'=>$this->renderPartial('tab_documentos', array('form'=>$form,'model'=>$model),TRUE)
				),
                            'Contabilidad'=>array('id'=>'tab___b_conta__o',
					'content'=>$this->renderPartial('tab_contabilidad', array('form'=>$form,'model'=>$model),TRUE)
				),

			),
			'options' => array('overflow'=>'auto','collapsible' => false,),
			'id'=>'MyTabi',)
	);
	?>
















	<div class="row buttons">
		<?php echo CHtml::submitButton( 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
	</div>

