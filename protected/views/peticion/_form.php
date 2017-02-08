<?php
/* @var $this PeticionController */
/* @var $model Peticion */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Peticion-form',
	'enableClientValidation'=>true,
	'clientOptions' => array(
		'validateOnSubmit'=>TRUE,
		'validateOnChange'=>TRUE  ,
	),
	'enableAjaxValidation'=>false,
)); ?>



	<div class="barrasup barrasup-simple">

		<?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'compra.png',"hola",array('width'=>'15','height'=>'8')); ?>
		<span class="badge titulosup-simple ">Crear Cotizacion
                </span>
		<div class="botonsup"><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'cerrar.png',"hola",array('width'=>'16','height'=>'16')); ?></div>
	</div>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
	<?php
	$botones=array(
		'go'=>array(
			       'type'=>'A',
			        'ruta'=>array(),
			        'visiblex'=>array(ESTADO_PREVIO),
		        ),
		'save'=>array(
			'type'=>'A',
			'ruta'=>array(),
			'visiblex'=>array(ESTADO_CREADO,ESTADO_APROBADO,ESTADO_ANULADO,ESTADO_PROCESO_COMPRA),
		),

		'pdf'=>array(
			'type'=>'B',
			'ruta'=>array($this->id.'/generaPDF',array('id'=>$model->id)),
			'visiblex'=>array(ESTADO_APROBADO),
		),
		'mail'=>array(
			'type'=>'B',
			'ruta'=>array($this->id.'/enviardocumento',array('id'=>$model->id)),
			'visiblex'=>array(ESTADO_APROBADO),
		),
		'ok'=>array(
			'type'=>'B',
			'ruta'=>array($this->id.'/aprobar',array('id'=>$model->id)),
			'visiblex'=>array(ESTADO_CREADO),
		),
		'add'=>array(
			'type'=>'C',
			'ruta'=>array($this->id.'/creadetalle',array(
											'idcabeza'=>$model->id,"cest"=>'01',
												//"id"=>$model->n_direc,
											"asDialog"=>1,
											"gridId"=>'detalle-grid',
												)
							),
			'dialog'=>'cru-dialogdetalle',
			'frame'=>'cru-detalle',
			'visiblex'=>array(ESTADO_CREADO),

				),
		'out'=>array(
			'type'=>'B',
			'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
			'visiblex'=>array(ESTADO_PREVIO,ESTADO_CREADO,ESTADO_APROBADO,ESTADO_ANULADO,ESTADO_PROCESO_COMPRA),
		),

	);





	$this->widget('ext.toolbar.Barra',
				array(
					//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
					'botones'=>$botones,
					'size'=>24,
					'extension'=>'png',
					'status'=>$model->codestado,

				)
	);?>

  </div>
	<div class="panelizquierdo">



		<div class="row">
			<?php echo $form->labelEx($model,'numero'); ?>
			<?php echo $form->textField($model,'numero',array('size'=>12,'maxlength'=>12,'Disabled'=>'Disabled')); ?>
			<?php echo $form->error($model,'numero'); ?>
		</div>

		<div class="row">


			<?php echo $form->labelEx($model,'socio'); ?>
			<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
			echo $form->DropDownList($model,'socio',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
			?>
			<?php echo $form->error($model,'socio'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php
				$this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'codpro',
						'ordencampo'=>1,
						'controlador'=>'Peticion',
						'relaciones'=>$model->relations(),
						'tamano'=>6,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'fehdfj',
					)
				);
			?>
			<?php echo $form->error($model,'codpro'); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'codproadqui'); ?>
			<?php
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codproadqui',
					'ordencampo'=>1,
					'controlador'=>'Peticion',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehdfjcvcvc',
				)
			);
			?>
			<?php echo $form->error($model,'codproadqui'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				//'name'=>'my_date',
				'model'=>$model,
				'attribute'=>'fecha',
				'language'=>'es',
				'options'=>array(
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'both', // 'focus', 'button', 'both'
					'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
					'buttonImageOnly'=>true,
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>'width:70px;vertical-align:top',
					'readonly'=>'readonly',
				),
			));
		?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'direntrega'); ?>
			<?php
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'direntrega',
					'ordencampo'=>1,
					'controlador'=>'Peticion',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehdfjgfgfgfgf',
				)
			);
			?>
			<?php echo $form->error($model,'direntrega'); ?>
		</div>


	<div class="row">
		<?php echo $form->labelEx($model,'fechacreac'); ?>
		<?php echo $form->textField($model,'fechacreac',array('disabled'=>'disabled')); ?>

	</div>

	<div class="row">


		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php /*$this->widget('Editorx',array(
			'options' =>
				array('id'=>'editor')
		));*/ ?>

		<div id="editor"> this will turn to WYSIWYG </div>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	</div>
	<div class="panelizquierdo">


	<div class="row">
		<?php echo $form->labelEx($model,'textocorto'); ?>
		<?php echo $form->textField($model,'textocorto',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'textocorto'); ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codestado'); ?>
			<?php echo (!$model->isnewRecord)?CHtml::textField($model->peticion_estado->estado,$model->peticion_estado->estado,array('size'=>40,'maxlength'=>40)):''; ?>

		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'grupocompras'); ?>
			<?php  $datos1 = CHtml::listData(Grupoventas::model()->findAll(),'codgrupo','desgru');
			echo $form->DropDownList($model,'grupocompras',$datos1, array('empty'=>'--Seleccione grupo compras--'  ) ) ;
			?>
			<?php echo $form->error($model,'grupocompras'); ?>
		</div>



	<div class="row">
		<?php echo CHtml::Label('usuario','usuario'); ?>
		<?php echo CHtml::textField('jkdgdkgkdg',strtoupper(Yii::app()->user->um->loadUserById($model->iduser,false)->username),array('disabled'=>'disabled')); ?>

	</div>










	<div class="row">


		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datos1=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropDownList($model,'codmon',$datos1, array('empty'=>'--Seleccione moneda--' ) ) ;
		?>

		<?php echo $form->error($model,'codmon'); ?>


	</div>

		<div class="row">


			<?php echo $form->labelEx($model,'codcen'); ?>
			<?php
			$datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
			echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro --'));

			?>
			<?php echo $form->error($model,'codcen'); ?>
		</div>




		<div class="row">
			<?php echo $form->labelEx($model,'validez'); ?>
			<?php echo $form->textField($model,'validez',array('size'=>3,'maxlength'=>3)); ?>
			<?php echo $form->error($model,'validez'); ?>
		</div>
		<div class="row">
			<?php echo Chtml::label('Solicitud','Solicitud'); ?>
			<?php //echo Chtml::textField('ddd',$model->peticion_solpe->numero,array('size'=>16,'maxlength'=>16)); ?>
			<?php echo CHtml::link($model->peticion_solpe->numero ,array('solpe/update','id'=>$model->peticion_solpe->id)); ?>
		</div>


		<div class="row">
			<?php if(!$model->isnewRecord) { ?>
			<?php echo $form->labelEx($model,'codobjeto'); ?>
			<?php
			$criterio=new CDbCriteria;
			$criterio->addcondition("codpro='".$model->codpro."'");
			$datos1 = CHtml::listData(ObjetosCliente::model()->findAll($criterio),'codobjeto','nombreobjeto');
			echo $form->DropDownList($model,'codobjeto',$datos1, array('empty'=>'--Seleccione objeto--' ) ) ;
			?>
			<?php echo $form->error($model,'codobjeto'); ?>
			<?php } ?>
		</div>

		<div class="row">
			<?php //if(!$model->isnewRecord) { ?>
				<?php echo $form->labelEx($model,'idcontacto'); ?>
				<?php
				$criterio=new CDbCriteria;
				$criterio->addcondition("c_hcod='".$model->codpro."'");
				$datos1 = CHtml::listData(Contactos::model()->findAll(),'id','c_nombre');
			echo Chtml::ajaxLink(
				Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
				CController::createUrl('Contactos/Contactosporprove'), array(
					'type' => 'POST',
					'url' => CController::createUrl('Contactos/Contactosporprove'), //  la acción que va a cargar el segundo div
					'update' => '#Peticion_idcontacto', // el div que se va a actualizar
					'data'=>array('codigoprov'=>'js:Peticion_codproadqui.value'),
				)

			);
			echo $form->DropDownList($model,'idcontacto',$datos1, array('empty'=>'--Seleccione Contacto--' ) ) ;



			?>
				<?php echo $form->error($model,'idcontacto'); ?>
			<?php //} ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>
		<div class="row">
			<?php echo $form->labelEx($model,'tenorsup'); ?>
			<?php echo $form->textField($model,'tenorsup',array('size'=>1,'maxlength'=>1)); ?>
			<?php echo $form->error($model,'ternorsup'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'tenorinf'); ?>
			<?php echo $form->textField($model,'tenorinf',array('size'=>1,'maxlength'=>1)); ?>
			<?php echo $form->error($model,'ternorinf'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'orcli'); ?>
			<?php echo $form->textField($model,'orcli',array('size'=>16,'maxlength'=>16)); ?>
			<?php echo $form->error($model,'orcli'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'fpago'); ?>
			<?php  $datos1 = CHtml::listData(Tipofacturacion::model()->findAll(),'codtipofac','tipofacturacion');
			echo $form->DropDownList($model,'fpago',$datos1, array('empty'=>'--Seleccione modalidad--'))  ;
			?>

			<?php echo $form->error($model,'fpago'); ?>
		</div>



	</div>



	



<?php $this->endWidget(); ?>

</div><!-- form -->



</div><!-- fin de Division -->

<DIV>

<?PHP
	$this->widget('zii.widgets.jui.CJuiTabs', array(
			'tabs' => array(
				'Detalle'=>array('id'=>'tab_general',
					'content'=>$this->renderPartial('vw_detalle_grilla',array('model'=>$model,'idcabecera'=>$model->id),TRUE)),
					'Auditoria'=>array('id'=>'tab_lo5665egss',
					'content'=>$this->renderPartial('tab_mensajes',array('model'=>$model),TRUE)),
			),
			'options' => array(	'collapsible' => false,
				'heightStyle'=>'auto',
			),
			'id'=>'MyTabe',
		));
	?>

	<?php
	//$this->renderpartial('vw_detalle_grilla',array('idcabecera'=>$model->id));
	?>
</DIV>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Crear item',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
	<iframe id="cru-frame3" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
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
		'width'=>800,
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