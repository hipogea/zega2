


	<div class="row">
		<?php echo $form->labelEx($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>8,'maxlength'=>8,'Disabled'=>'Disabled')); ?>
		<?php echo $form->error($model,'numcot');  ?>
	</div>

	
		<div class="row">
		            <?php echo $form->labelEx($model,'codpro'); ?>
					<?php
					
					if ($this->eseditable($model->codestado)=='')
		
						{
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codpro',												
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfj',
													)
													
								);
							} else{
						echo CHtml::textField('Sa',$model->clientes->despro,array('disabled'=>'disabled','size'=>40)) ;
				
								}	
			   ?>
			   
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php

		if ($this->eseditable($model->codestado)=='')

		{
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codresponsable',
					'ordencampo'=>1,
					'controlador'=>$this->id,
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehdfddj',
				)

			);
		} else{
			echo CHtml::textField('Saccc',$model->responsable1->ap.'-'.$model->responsable1->ap.'-'.$model->responsable1->nombres,array('disabled'=>'disabled','size'=>40)) ;

		}
		?>

	</div>
	
	<div style='float: left;'>
					<?php echo $form->error($model,'codpro'); ?>
	</div>







	<div class="row">

		<?php echo $form->labelEx($model,'idcontacto'); ?>
		<?php if($this->eseditable($model->codestado)=='') { ?>
		<?php
		$criterio=new CDbCriteria;
		$criterio->addcondition("c_hcod='".$model->codpro."'");
		$datos1 = CHtml::listData(Contactos::model()->findAll($criterio),'id','c_nombre');
		echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl('Contactos/Contactosporprove'), array(
				'type' => 'POST',
				'url' => CController::createUrl('Contactos/Contactosporprove'), //  la acción que va a cargar el segundo div
				'update' => '#Ocompra_idcontacto', // el div que se va a actualizar
				'data'=>array('codigoprov'=>'js:Ocompra_codpro.value'),
			)

		);
		echo $form->DropDownList($model,'idcontacto',$datos1, array('empty'=>'--Seleccione Contacto--' ) ) ;



		?>
		<?php echo $form->error($model,'idcontacto'); ?>
		<?php }else {
			echo  CHtml::textField('dfdfd',$model->contactos->c_nombre,array('size'=>40,'disabled'=>'disabled'));
		}
		//
		//
		//
		// ?>
	</div>




	<?php echo $form->hiddenField($model,'idguia') ;  ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php IF(!$model->isNewRecord) {
		       
		     echo CHtml::textField('hola',
			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>$this->documento,':miestado'=>$model->codestado))->estado,
			  array('disabled'=>'disabled','size'=>20));
			  }
			  echo $form->hiddenField($model,'codestado');
		?>
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>40,'maxlength'=>40,'disabled'=>$this->eseditable($model->codestado))); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'tipologia'); ?>
		<?php  $datos1c = CHtml::listData(Tipooc::model()->findAll(),'codtipo','destipo');
		echo $form->DropDownList($model,'tipologia',$datos1c, array('empty'=>'--Seleccione tipo--','disabled'=>$this->eseditablebase($model->codestado) ) ) ;?>

		<?php echo $form->error($model,'tipologia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>3,'maxlength'=>3,'disabled'=>$this->eseditable($model->codestado))); ?>


		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orcli'); ?>
		<?php echo $form->textField($model,'orcli',array('size'=>12,'maxlength'=>12,'disabled'=>$this->eseditable($model->codestado))); ?>
		<?php echo $form->error($model,'orcli'); ?>
	</div>
