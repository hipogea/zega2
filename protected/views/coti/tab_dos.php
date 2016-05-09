




<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php
				$opcionesajax=array( 
                   					 'type'=>'POST', 
										'url'=>Yii::app()->createUrl('/Coti/Nada'),	
                    					'success'=>'reloadGrid',
               					 ) ;



		?>
		<?php echo $form->textField($model,'descuento',array('size'=>4,'ajax'=>$opcionesajax,'maxlength'=>4)); ?>
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
	  
		
		<?php echo $form->labelEx($model,'codsociedad'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'codsociedad',$datos1, array('empty'=>'--Seleccione un emisor--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codsociedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupoventas'); ?>
		<?php  $datos1 = CHtml::listData(Grupoventas::model()->findAll(),'codgrupo','nomgru');
		  echo $form->DropDownList($model,'codgrupoventas',$datos1, array('empty'=>'--Seleccione grupo ventas--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codgrupoventas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipocotizacion'); ?>
		<?php echo $form->textField($model,'codtipocotizacion',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'codtipocotizacion'); ?>
	</div>





	<div class="row">
		<?php echo $form->labelEx($model,'validez'); ?>
		<?php echo $form->textField($model,'validez',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'validez'); ?>
	</div>

 <div class="row">
	  
		
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php
		     $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcentro',$datos, array('empty'=>'--Llene el centro emisor--','disabled'=>$this->eseditable($model->codestado)));

		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'codobjeto'); ?>
		<?php echo $form->textField($model,'codobjeto',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'codobjeto'); ?>
	</div>