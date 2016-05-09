
	    <div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
		if ($modelopadre->escompra<>'1') { //si se trata de una solped imputada
		if ($habilitado=='')
		
						{	$this->widget('ext.matchcode.MatchCode',array(
												'nombrecampo'=>'imputacion',
												//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
												'ordencampo'=>7,
												'controlador'=>'Desolpe',
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'mifreerfuufu',
											//'nombrecampoareemplazar'=>'imputacion',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));

										 echo $form->error($model,'imputacion');

							} else{
								echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>10)) ;
						//echo $form->textField($model,'imputacion',array('disabled'=>'disabled','size'=>30)) ;
				
								}	
					}
			   ?>
	</div>

