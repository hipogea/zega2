
	<div class="wide form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'guia-form',
			'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
			'enableAjaxValidation'=>false,

		)); ?>

		<?php
		$orden=$model->getubicacion(); $numerodelotes=$model->inventario->numerolotes;
		?>



			<div class="row">
				<?php
				$botones=array(
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array('10'),
					),


					'first' => array(
						'type' => 'D', //AJAX LINK
						'ruta' => array($this->id.'/colocaloteultimo', array('idlote' => $model->id)),
						'opajax' => array(
							'type' => 'GET',
								'success' => 'function(){
                                          $("#sss").value=3333378;
                                         }'
						),
						/*'success'=>'function(data) {
                                         $("#myDivision").html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                        }'
                                        ),*/
						'visiblex' => ARRAY($orden < $numerodelotes),

					),
					'back'=>array(
						'type' => 'D', //AJAX LINK
						'ruta' => array($this->id.'/ordenlotebaja1', array('idlote' => $model->id)),
						'opajax' => array(
							'type' => 'GET',
							'success' => 'function(){
                                          $("#sss").value=3333378;
                                         }'
						),
						'visiblex' => ARRAY($orden < $numerodelotes ),

					),
					'go'=>array(
						'type' => 'D', //AJAX LINK
						'ruta' => array($this->id.'/ordenlotesube1', array('idlote' => $model->id)),
						'opajax' => array(
							'type' => 'GET',
							'success' => 'function(){
                                          $("#sss").value=3333378;
                                         }'
						),
						'visiblex' => ARRAY($orden > 1),

					),
					'last'=>array(
						'type' => 'D', //AJAX LINK
						'ruta' => array($this->id.'/colocaloteprimero', array('idlote' => $model->id)),
						'opajax' => array(
							'type' => 'GET',
							'success' => 'function(){
                                          $("#sss").value=3333378;
                                         }'
						),
						'visiblex' => ARRAY($orden >1),

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

		<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Inicio'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_lote', array('form'=>$form,'model'=>$model),TRUE)
					),



					'Auditoria'=>array('id'=>'tab___.',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),
				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>



		<?php $this->endWidget(); ?>
	</div><!-- form -->
</div><!-- form -->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
$this->endWidget();
?>





