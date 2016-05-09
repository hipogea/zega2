


	<div class="row">
		<?php echo $form->labelEx($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>8,'maxlength'=>8,'Disabled'=>'Disabled')); ?>
		<?php echo $form->error($model,'numcot'); ?>
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
	
	<div style='float: left;'>
					<?php echo $form->error($model,'codpro'); ?>
	</div>



<div class="row">
		<?php echo $form->labelEx($model,'idobjeto'); ?>
		<?php
					
					if ($this->eseditable($model->codestado)=='')
		
						{
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'idobjeto',												
												'ordencampo'=>3,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehd4444fjzx',
													)
													
								);
							} else{
						echo CHtml::textField('Swwssa',$model->contactos->c_nombre,array('disabled'=>'disabled','size'=>40)) ;
				
								}	
			   ?>
		<?php echo $form->error($model,'idobjeto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcontacto'); ?>
		<?php
					
					if ($this->eseditable($model->codestado)=='')
		
						{
					$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'idcontacto',												
												'ordencampo'=>1,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfjzx',
													)
													
								);
							} else{
						echo CHtml::textField('Sssa',$model->contactos->c_nombre,array('disabled'=>'disabled','size'=>40)) ;
				
								}	
			   ?>
		
		<?php echo $form->error($model,'idcontacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php IF(!$model->isNewRecord) { 
		       
		     echo CHtml::textField('hola',
			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>'011',':miestado'=>$model->codestado))->estado,
			  array('disabled'=>'disabled','size'=>20));
			  }
			  echo $form->hiddenField($model,'codestado');
		?>
		
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'tipologia'); ?>
		<?php echo $form->textField($model,'tipologia',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tipologia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php  $datos1 = CHtml::listData(TMoneda::model()->findAll(),'codmoneda','desmon');
		  echo $form->DropDownList($model,'moneda',$datos1, array('empty'=>'--Seleccione moneda--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
	
		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orcli'); ?>
		<?php echo $form->textField($model,'orcli',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'orcli'); ?>
	</div>
