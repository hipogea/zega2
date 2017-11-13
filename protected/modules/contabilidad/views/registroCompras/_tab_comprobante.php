<fieldset>
                <legend>Comprobante</legend>
                
                 <div class="row"> 
		<?php echo $form->labelEx($model,'socio'); ?>
		<?php  $datos1 = CHtml::listData(Sociedades::model()->findAll(array('order'=>'dsocio')),'socio','dsocio');
		  echo $form->DropDownList($model,'socio',$datos1, array('empty'=>'--Seleccione un emisor--')  )  ;
		?>
                 </div>
                     <div class="row">
		<?php echo $form->labelEx($model,'glosa'); ?>
                         <?php echo $form->textField($model,'glosa',array('size'=>25,'maxlength'=>25)); ?>
			
		<?php echo $form->error($model,'glosa'); ?>
	                </div>
                 <div class="row"> 
		<?php echo $form->labelEx($model,'hidperiodo'); ?>
		<?php  $datos1d =yii::app()->periodo->periodosActivos() ;
		  echo $form->DropDownList($model,'hidperiodo',$datos1d, array('empty'=>'--Seleccione un Periodo--')  )  ;
		?>    
                     
		<?php echo $form->error($model,'hidperiodo'); ?>
	         </div>
                 <div class="row">
                        <?php echo $form->labelEx($model,'serie'); ?>
                     
                    
			<?php echo $form->textField($model,'serie',array('class'=>'numerodocumento','size'=>4,'maxlength'=>4)); ?>
			<?php echo $form->error($model,'serie'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'numerocomprobante'); ?>
                     <?php $opajax=array(
                              'type'=>'POST',
                         'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/rellena"),
                           'data'=>array('numero'=>'js:Registrocompras_numerocomprobante.value'),
                         'success'=>'js:function(data){$("#Registrocompras_numerocomprobante").val(data);}',
                          //'update'=>'#Registrocompras_numerocomprobante',
                         ); ?>
                    
			<?php echo $form->textField($model,'numerocomprobante',array('ajax'=>$opajax,'class'=>'numerodocumento','size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'numerocomprobante'); ?>
                </div>
                <div class="row">
                        <?php  echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->DropDownList($model,'tipo', Sunatmaster::datoslista('010'), array('empty'=>'--Seleccione un tipo de documento--')); ?>
			<?php echo $form->error($model,'tipo');  ?>
                </div>
     
                
     <div class="row">
                        <?php echo $form->labelEx($model,'femision'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'femision',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						//'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'femision'); ?>
                </div>
     
     <div class="row">
                        <?php /*echo $form->labelEx($model,'fvencimiento'); ?>
                       <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
					//'name'=>'my_date',
					'model'=>$model,
					'attribute'=>'fvencimiento',
					'language'=>'es',
					'options'=>array(
						'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
						'showOn'=>'both', // 'focus', 'button', 'both'
						'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
						'dateFormat'=>'dd/mm/yy',
					),
					'htmlOptions'=>array(
						'style'=>'width:80px;vertical-align:top',
                                            
						//'readonly'=>'readonly',
					),
				));    ?>
			<?php echo $form->error($model,'fvencimiento'); */ ?>
                </div>
     
                <div class="row">
            <?php /* if($model->isAttributeSafe('codaduana')) { ?>
		<?php echo $form->labelEx($model,'codaduana'); ?>
			<?php echo $form->DropDownList($model,'codaduana', Sunatmaster::datoslista('011'), array('empty'=>'--Seleccione centro aduana--')); ?>
                 <?php echo $form->error($model,'codaduana'); ?>  
            <?php }  */ ?>
                </div>
                     
                     <div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datosv=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropdownList($model,'codmon',$datosv,array('empty'=>'--Seleccione moneda--','disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codmon'); ?>
                     </div>
                      <div class="row">
		<?php echo $form->labelEx($model,'tipgrabado'); ?>
		<?php $datosvq=array('1'=>'Gravado','2'=>'No Gravado','3'=>'Mixto'); ?>
		<?php echo $form->DropdownList($model,'tipgrabado',$datosvq,array('empty'=>'--Seleccione modo--','disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'tipgrabado'); ?>
                     </div>
                     <div class="row">
		<?php echo $form->labelEx($model,'importe'); ?>
                         <?php echo $form->textField($model,'importe',array('size'=>5,'maxlength'=>5)); ?>
			
		<?php echo $form->error($model,'importe'); ?>
	</div>
         <div class="row"> 
		<?php echo $form->labelEx($model,'esservicio'); ?>
		<?php  $datos1 = array('M'=>'Materiales','S'=>'Servicios');
		  echo $form->DropDownList($model,'esservicio',$datos1, array('empty'=>'--Seleccione el tipo de compra--')  )  ;
		?>
                     
		<?php echo $form->error($model,'esservicio'); ?>
	         </div>
                
     </fieldset>
     
       