




<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php
				$opajax=array(
                   					 'type'=>'POST',
										'url'=>Yii::app()->createUrl('/Ocompra/refrescadescuento'
										),
										//'data'=>array('idguia'=>$model->idguia),
					"success"=>"js:function() {
					 $.fn.yiiGridView.update('resumenoc-grid');
					$.fn.yiiGridView.update('detalle-grid');

					                            }"
				) ;



		?>
		<?php echo $form->textField($model,'descuento',array('size'=>4,'ajax'=>$opajax,'maxlength'=>4,'disabled'=>$this->eseditable($model->codestado))); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codtipofac'); ?>
		<?php  $datos1 = CHtml::listData(Tipofacturacion::model()->findAll(),'codtipofac','tipofacturacion');
		  echo $form->DropDownList($model,'codtipofac',$datos1, array('empty'=>'--Seleccione modalidad--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
	
		<?php echo $form->error($model,'codtipofac'); ?>
	</div>

<div class="row">
	<?php echo $form->labelEx($model,'direcentrega'); ?>
	<?php
	  if(!$model->isNewRecord) {
		  $criteriox = New CDBcriteria;
		  $criteriox->addcondition ( "c_hcod=:vc_hcod" );
		  $criteriox->params = array ( ":vc_hcod" => $model->sociedades->proveedor()->codpro );
		  //VAR_DUMP($model->sociedades->proveedor()->codpro );
                  ?>
		  ?>
		  <?php $datos11 = CHtml::listData ( Direcciones::model ()->findAll ( $criteriox ) , 'n_direc' , 'c_direc' );
	     // print_r($datos11);
	  } else {
		  $datos11 =array();
	       }

	echo $form->DropDownList($model,'direcentrega',$datos11, array('empty'=>'--Seleccione una direccion--','disabled'=>$this->eseditable($model->codestado))  )  ;
	?>

	<?php echo $form->error($model,'direcentrega'); ?>
</div>



	  <div class="row">
	  
		
		<?php echo $form->labelEx($model,'codsociedad'); ?>
		<?php
		$opajax1=array(
			'type' => 'POST',
			'data'=>array('socito'=>'js:this.value'),
			'url' => CController::createUrl('Ocompra/cargadirecciones'), //  la acción que va a cargar el segundo div
			'update' => '#Ocompra_direcentrega' // el div que se va a actualizar
		);
		?>

		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'codsociedad',$datos1, array('ajax'=>$opajax1,'empty'=>'--Seleccione un emisor--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codsociedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupoventas'); ?>
		<?php  $datos1 = CHtml::listData(Grupocompras::model()->findAll(),'codgrupo','nomgru');
		  echo $form->DropDownList($model,'codgrupoventas',$datos1, array('empty'=>'--Seleccione grupo compras--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codgrupoventas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipocotizacion'); ?>
		<?php echo $form->textField($model,'codtipocotizacion',array('size'=>1,'maxlength'=>1,'disabled'=>$this->eseditablebase($model->codestado))); ?>
		<?php echo $form->error($model,'codtipocotizacion'); ?>
	</div>

<div class="row">
	<?php // echo $form->labelEx($model,'direcentrega'); ?>
	<?php //echo $form->textField($model,'direcentrega'); ?>
	<?php //echo $form->error($model,'direcentrega'); ?>
</div>




	<div class="row">
		<?php echo $form->labelEx($model,'validez'); ?>
		<?php echo $form->textField($model,'validez',array('size'=>2,'maxlength'=>2,'disabled'=>$this->eseditable($model->codestado))); ?>
		<?php echo $form->error($model,'validez'); ?>
	</div>


	
	<div class="row">
		<?php echo $form->labelEx($model,'codobjeto'); ?>
		<?php echo $form->textField($model,'codobjeto',array('size'=>3,'maxlength'=>3,'disabled'=>$this->eseditable($model->codestado))); ?>
		<?php echo $form->error($model,'codobjeto'); ?>
	</div>


<?PHP
echo CHtml::script(" function reloadGrid(data) {
    $.fn.yiiGridView.update('detalle-grid');
} ");

?>