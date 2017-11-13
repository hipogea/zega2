                <legend>Datos del Proveedor</legend>	
     
                 <div class="row">
           
		<?php echo $form->labelEx($model,'tipodocid'); ?>
			<?php echo $form->DropDownList($model,'tipodocid', Sunatmaster::datoslista('002'), array('empty'=>'--Seleccione tipo Doc Identidad--')); ?>
                 <?php echo $form->error($model,'tipodocid'); ?>  
           
                </div>
                
                 <div class="row">
                        <?php echo $form->labelEx($model,'numerodocid'); ?>
                      <?php $opajax1=array(
                          'type'=>'POST',
                           'url'=>yii::app()->createUrl(Yii::app()->controller->module->id."/".$this->id."/ajaxmuestraproveedor"),
                           'data'=>array(
                               'ruc'=>'js:Registrocompras_numerodocid.value',
                                'tipo'=>'js:Registrocompras_tipodocid.value',
                                           ),
                               'success'=>'js:function(data){ $("#Registrocompras_razpronombre").val(data); }',                           
                               );
                       ?>
			<?php echo $form->textField($model,'numerodocid',array('ajax'=>$opajax1,'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'numerodocid'); ?>
                   </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'razpronombre'); ?>
			<?php echo $form->textField($model,'razpronombre',array('size'=>100,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'razpronombre'); ?>
                </div>
                
        </fieldset> 