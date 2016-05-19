<?php

?>


<div class="division">
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

	   	<div class="barrasup barrasup-simple">

	   		<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'compra.png',"hola",array('width'=>'15','height'=>'8')); ?>
	   		<span class="badge titulosup-simple ">Guia de Remision
	            </span>
	   		<div class="botonsup"><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'cerrar.png',"hola",array('width'=>'16','height'=>'16')); ?></div>
	   	</div>


		<?php  echo $form->errorSummary($model); ?>

		<div class="row">
<?PHP
?>
			<div class="row">
				<?php
				$botones=array(
					'go'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_PREVIO,NUll,''),
					),
					'save'=>array(
						'type'=>'A',
						'ruta'=>array(),
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO,ESTADO_CONFIRMADO,ESTADO_FACTURADO),
					),


					'ok'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>2)),//apreuba guia
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_CREADO),
					),
					'tacho'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>35)),//anula guia
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_CREADO),

					),
					'undo'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>64)),//reveiree liberacion
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_AUTORIZADO),

					),
					'truck'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>36)), //confirma trasladoa
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_AUTORIZADO),

					),

					'pack1'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>37)), //confirma entrega
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_CONFIRMADO),

					),
					'pack'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/procesardocumento',array('id'=>$model->id,'ev'=>69)), //revertir  entrega
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_ENTREGADO),

					),
					'print'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/imprimir/',array('id'=>$model->id)),
						'visiblex'=>array($this->editable($model->{$this->campoestado}),ESTADO_CREADO,ESTADO_AUTORIZADO),
					),

					'edit'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/editadocumento',array('id'=>$model->id)), //confirma trasladoa
						'visiblex'=>array(!$this->editable($model->{$this->campoestado}),ESTADO_ENTREGADO,ESTADO_CREADO,ESTADO_AUTORIZADO,ESTADO_ANULADO,ESTADO_CONFIRMADO,ESTADO_FACTURADO),
					),


						'out'=>array(
						'type'=>'B',
						'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
						'visiblex'=>array($model->{$this->campoestado}),
					),

				);





				$this->widget('ext.toolbar.Barra',
					array(
						//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
						'botones'=>$botones,
						'size'=>24,
						'extension'=>'png',
						'status'=>$model->{$this->campoestado},

					)
				); ?>

			</div>


		</div>

		<?php
		$this->widget('zii.widgets.jui.CJuiTabs', array(
				'theme' => 'default',
				'tabs' => array(
					'Inicio'=>array('id'=>'tab_',
						'content'=>$this->renderPartial('tab_principal', array('form'=>$form,'model'=>$model),TRUE)
					),

					'Mensajes'=>array('id'=>'tab__',
						'content'=>$this->renderPartial('tab_mensajes', array('model'=>$model),TRUE)
					),

					'Auditoria'=>array('id'=>'tab___._..__',
						'content'=>$this->renderPartial('//site/tab_auditoria', array('model'=>$model),TRUE)
					),




				),
				'options' => array('overflow'=>'auto','collapsible' => false,),
				'id'=>'MyTabi',)
		);
		?>





		<div style="float:left; width:100%; clear :right ; background : #eee ">

			<?php

			 IF( !$model->isNewRecord )  {

				$this->renderpartial('vw_detalle_guia',array('modelcabecera'=>$model,'eseditable'=>$this->eseditable($model->c_estgui)));

			}



			?>
		</div>




		<?php

		//--------------------- begin new code --------------------------
		// add the (closed) dialog for the iframe
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

		//--------------------- end new code --------------------------
		?>




		<?php $this->endWidget(); ?>

	</div><!-- form -->

</div><!-- form -->







