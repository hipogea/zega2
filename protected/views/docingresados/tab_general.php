<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docingresados-form',
	'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        // 'validateOnChange'=>true       
    ),
	'enableAjaxValidation'=>true,
	
)); ?>

    
<?php echo $form->hiddenField($model,'codocu',array('value'=>$model->codocu)); ?>
		
	   <?php  $form->errorSummary($model);  ?>
    <div class="row">        
                <?php 			
	echo $form->textField($model,'id',array('disabled'=>'disabled','size'=>2,'maxlength'=>2));
		?>
		<?php 
		         if (!$model->isNewRecord ) {						
				echo $form->textField($model,'correlativo',array('disabled'=>'disabled','size'=>5,'maxlength'=>8));
				 }
		?>
	
		<?php echo $form->labelEx($model,'codtenencia'); ?>
		<?php  
                if(!$model->isNewRecord){
                   // var_dump($model::PARAM_TENENCIA_POR_DEFECTO);
                   echo $form->textField($model,'codtenencia',array('size'=>2,'disabled'=>'disabled')); 
                        echo Chtml::textField('idtextenencfia',$model->tenencias->deste,array('size'=>30,'disabled'=>'disabled')); 
                         
                }else{
                  
                    if(is_null(Configuracion::valor(
                                    $model->codocu,
                                     $model->codlocal, 
                                    $model::PARAM_TENENCIA_POR_DEFECTO))){
                      $datos = CHtml::listData(Tenencias::model()->findAll(),'codte','deste');
					echo $form->DropDownList($model,'codtenencia',$datos, array('empty'=>'--Seleccione tenencia --')  );
					//ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
			
                     
                     }
                  }
                
                ?>
		<?php echo $form->error($model,'codtenencia'); ?>
	</div>
    
    
    
    
    
     <div class="row">
		
		<?php  
               
                if(!$model->isNewRecord and count($model->procesoactivo)>0){
                     $procedimiento=$procesoactivo->tenenciasproc;
                    echo Chtml::label("Proceso Actual:","4nfkg85");
                echo Chtml::textField('idtextyyenencfia',$procedimiento->eventos->descripcion,array('size'=>30,'disabled'=>'disabled')); 
                   echo Chtml::textField('ivbgetcfia',$procesoactivo->tenenciastrab->trabajadores->ap,array('size'=>30,'disabled'=>'disabled')); 
                      if(!$esfinal) ///si no es final enornce spina semaforo
                      {$this->widget('ext.semaforo.Semaforo',
                      array(
                          'valores'=>ARRAY(0,$procedimiento->nhorasverde,$procedimiento->nhorasnaranja),
                              'asc'=>-1,
                             'valor'=>$procesoactivo->horaspasadas(),
                      )
                        ); 
                       echo Chtml::textField('idtex45encfia',$procesoactivo->tiempopasado(),array('size'=>9,'disabled'=>'disabled')); 
                  
                      }else{ //en caso de ser final
                        echo Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/'.'45070.png','',array('width'=>25,'height'=>25)); 
                     
                      }
                    
                }
               		
                ?>
		
	</div>
    
    
    <div class="panelizquierdo">
        
      
        
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'codprov'); ?>
            
		<?php  if(!$model->escertificado()){  ?>
                    <?php $this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codprov',
												'ordencampo'=>1,
												//'defol'=>(isset(Yii::app()->session['codprov']))?Yii::app()->session['codprov']:'',
												//'defol2'=>isset(Yii::app()->session['desprov'])?Yii::app()->session['desprov']:'',
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>6,
												'model'=>$model,
												'form'=>$form,
                                                                                               // 'filtro'=>array(),
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'coci',
													)

								);
		?>
                <?php  } else { ?>
            
                    <?php  echo CHtml::textField(uniqid(), $model->clipro->despro, array('disabled'=>'disabled','size'=>'40'));  ?>
            
                <?php   }  ?>
            
            <?php echo $form->error($model,'codprov'); ?>
	</div>


    
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecha',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',
                                                                                            'showOtherMonths'=>true, 
                                     'changeMonth' => true, 
                                    'changeYear' => true, 
														),
												'htmlOptions'=>array(
															'style'=>'width:80px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

		?>	
            
          
		<?php echo $form->error($model,'fecha'); ?>
            
               
            
            
	</div>

	<div class="row">
            <?php  if(!$model->escertificado()){  ?>
		<?php echo $form->labelEx($model,'fechain'); ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			//'name'=>'my_date',
				'model'=>$model,
				'attribute'=>'fechain',
				'language'=>Yii::app()->language=='es' ? 'es' : null,
                                'options'=>array(
					'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
					'showOn'=>'button', // 'focus', 'button', 'both'
					'buttonText'=>Yii::t('ui','...'),													
					'dateFormat'=>'yy-mm-dd',
                                    'showOtherMonths'=>true, 
                                     'changeMonth' => true, 
                                    'changeYear' => true, 
					),
					'htmlOptions'=>array(
							//'value'=>(  ($model->isNewRecord ) and    isset(Yii::app()->session["fechain"]) ) ?Yii::app()->session["fechain"]:$model->fechain,
						'style'=>'width:80px;vertical-align:top',
						'readonly'=>'readonly',
				 
					),
				));

		?>	
		<?php echo $form->error($model,'fechain'); ?>
            
            <?php  }  ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'conservarvalor'); ?>
		<?php echo $form->checkBox($model,'conservarvalor',array('checked'=>true)); ?>
		
	</div>
        <div class="row">
             <?php  if(!$model->escertificado()){  ?>
		<?php echo $form->labelEx($model,'espeabierto'); ?>
		<?php echo $form->checkBox($model,'espeabierto'); ?>
		<?php  }  ?>
	</div>
        
	
	

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipodoc'); ?>
		
                    <?php $this->widget('ext.matchcode.MatchCode',array(		
                                            'nombrecampo'=>'tipodoc',
						'ordencampo'=>1,
						//'defol'=>(isset(Yii::app()->session['tipodoc']))?Yii::app()->session['codprov']:'',
						//'defol2'=>isset(Yii::app()->session['desprov'])?Yii::app()->session['desprov']:'',
						'controlador'=>$this->id,
						'relaciones'=>$model->relations(),
						'tamano'=>3,
						'model'=>$model,
						'form'=>$form,
							'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'cocicgy34',
							)
				);
		?>
                    
                    
                    
                    <?php // $datos = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
		 // echo $form->DropDownList($model,'tipodoc',$datos, array(
		                                       //        'empty'=>'--Seleccione un documento--',
													 //  'options'=>array(
													       //   isset(Yii::app()->session['tipodoc'])?Yii::app()->session['tipodoc']:''=>array('selected'=>true)
																//		) 
															//			
															//	) ) ;
		?>
		<?php echo $form->error($model,'tipodoc'); ?>
	</div>
        
        
            
       
        
        <?php 
        if(!$esfinal) {
            if(strlen($procesoactivo->codocuref)>0){
               echo  $this->renderPartial('//site/celular', array('form'=>$form,'model'=>$model),TRUE);
             
             }else{  ?>
            <div style="font-family:verdana;color:#000; font-size: 13px; text-shadow: #aaa 1px 0px 1px;border-style:solid;border-radius:8px; margin:6px;padding:6px;width:350px;background-color:#f3f3eb; border-color:#ffce08;border-width:1px;">
		No puede subir archivos, mientras no especifique el tipo y el 
                 Número de documento en el proceso activo  <?php
                echo $procedimineto->eventos->descripcion
                ?>
	    </div>
         <?php  } 
        }?>
        
        
        
        
    </div>
    <div class= "panelderecho"> 
        
         <div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero'); ?>
	    </div>
        
        
	<div class="row">
            
              <?php  if(!$model->escertificado()){  ?>
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php  
               
		
		 $datos=CHTml::listdata(Monedas::model()->FindAll(
                         "habilitado='1'",array("order"=>"desmon ASC")),
                         'codmoneda','desmon'); 
		 echo $form->DropdownList(
                                    $model,'moneda',$datos,array('empty'=>'--Seleccione moneda--',
                                    /*'options'=>array(
                                                        isset(Yii::app()->session['moneda'])?
                                                         Yii::app()->session['moneda']:
                                                        ''=>array('selected'=>true)
                                                      )*/ )); 
		 echo $form->error($model,'moneda'); 
                 
		  
			/*echo $form->DropDownList($model,'moneda',$datos, array('empty'=>'--Indique la moneda--','options'=>array(
													          isset(Yii::app()->session['moneda'])?Yii::app()->session['moneda']:''=>array('selected'=>true)
																		) 
																		
			
                         */
                 ?>
			<?php echo $form->error($model,'moneda'); ?>
            
              <?php }  ?>
	</div>
	
	
	
	
	
	
	
    
	<div class="row">
		<?php echo $form->labelEx($model,'codepv'); ?>
		<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codepv',$datos, array('empty'=>'--Seleccione una Embarcacion --' 
																		
																)  )
					?>
		<?php echo $form->error($model,'codepv'); ?>
	</div>
	

	<div class="row">
              <?php  if(!$model->escertificado()){  ?>
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
              <?php }  ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codgrupo'); ?>
		<?php  $datos = array('192' => 'Operaciones ','193'=> 'Mantenim.','194'=> 'Adm Flota.');
		  
			echo $form->DropDownList($model,'codgrupo',$datos, array('empty'=>'--Llene el grupo--')  )  ;	?>
		<?php echo $form->error($model,'codgrupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
            
           
		
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codresponsable',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
                    //'filtro'=>array('codpro'=>'js:Docingresados_codpro.value'),
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fhevfrdfa3gt4jfdxxsfdf',
		)); ?>
		
	

            
            
            
            
            
		
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>
   
	

	

	<div class="row">
		<?php echo $form->labelEx($model,'docref'); ?>
		<?php echo $form->textField($model,'docref',array('size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'docref'); ?>
	</div>

	

    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'texv'); ?>
		<?php echo $form->textArea($model,'texv',array('rows'=>2, 'cols'=>100)); ?>
		<?php echo $form->error($model,'texv'); ?>
	</div>
    
    
<?php $this->endWidget(); ?>

</div><!-- form -->

</div>


<?php
//VAR_DUMP(Yii::app()->createUrl($this->id."/ajaxanulacion",array("id"=>$data->id)));

   if(!$model->isNewRecord){
       $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'procesos-grid',
            'dataProvider'=> Procesosdocu::model()->search_por_docu($model->id),
           
             'itemsCssClass'=>'table table-striped table-bordered table-hover', 
           'columns'=>array(
               // 'fechanominal',                
                
               ARRAY('name'=>'iduser1','type'=>'raw','value'=>'($data->anulado=="1")?CHtml::openTag("span",array("class"=>"icon icon-bin icon-blue icon-fuentesize16"),true):CHtml::link(CHtml::openTag("span",array("class"=>"icon icon-pencil icon-blue icon-fuentesize16"),true),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/docingresados/modificaproceso\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )','htmlOptions'=>array('width'=>3)),
               ARRAY('name'=>'Anul','type'=>'raw','value'=>'($data->anulado=="1")?"":CHtml::ajaxLink(CHtml::openTag("span",array("class"=>"icon icon-cross icon-blue icon-fuentesize16"),true),'
                   . 'CHtml::normalizeUrl(Yii::app()->createUrl("docingresados/ajaxanulacion")),'
                   . 'array("type" => "POST", "data"=>array("id"=>$data->id), "beforeSend"=>"function(){ var r = confirm(\"Esta seguro de ejecutar la anulación ?\"); if(!r){return false;} }", "success"=>"function(data) { $.fn.yiiGridView.update(\"procesos-grid\"); return false; }"  ),array() )'),
                ARRAY('name'=>'Mail','type'=>'raw','value'=>'($data->anulado=="1")?"":CHtml::ajaxLink(CHtml::openTag("span",array("class"=>"icon icon-envelop icon-blue icon-fuentesize16"),true),'
                   . 'CHtml::normalizeUrl(Yii::app()->createUrl("docingresados/ajaxenviacorreoproceso")),'
                   . 'array("type" => "GET", "data"=>array("id"=>$data->id), "beforeSend"=>"function(){ var r =confirm(\"Esta seguro de Enviar este mensaje al proveedor?\"); if(!r){return false;} }", "success"=>"function(data) { alert(data); }"  ),array() )'),

               array(
			'name'=>'fechanominal', 'type'=>'raw',
			'value'=>'($data->anulado=="1")?CHtml::openTag("strike").date("d.m.y", strtotime($data->fechanominal)).CHtml::closeTag("strike"):date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>10)
		),
                //array('name'=>'tipo','type'=>'raw','value'=>'($data->tipo=="M")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."email.png"):$data->tipo','htmlOptions'=>array('width'=>50)),
          
               array('name'=>'proc','type'=>'raw','value'=>'($data->anulado=="1")?CHtml::openTag("strike").$data->tenenciasproc->eventos->descripcion.CHtml::closeTag("strike"):$data->tenenciasproc->eventos->descripcion','htmlOptions'=>array('width'=>250)),
             array('name'=>'trab','type'=>'raw','value'=>'($data->tenenciastrab->trabajadores->ap)','htmlOptions'=>array('width'=>30)),
             array('name'=>'codocuref','type'=>'raw','value'=>'$data->documentos->desdocu','htmlOptions'=>array('width'=>150)),
            array('name'=>'numdocref','type'=>'raw','value'=>'$data->numdocref','htmlOptions'=>array('width'=>10)), 
            array(
			'name'=>'fechafin',
			'value'=>'(!is_null($data->fechafin))?date("d/m/y", strtotime($data->fechafin)):"--"','htmlOptions'=>array('width'=>10)
		),
               array('name'=>'tiempo','type'=>'raw','value'=>'($data->tiempopasado())','htmlOptions'=>array('width'=>120)),
            array('name'=>'falta','type'=>'raw','value'=>'($data->tiempofaltante())','htmlOptions'=>array('width'=>120)),
           
               array('name'=>'iduser', 'type'=>'html','value'=>'$data->iduser.CHtml::openTag("span",array("class"=>"icon icon-user icon-blue icon-fuentesize16"),true)'),
        
                //'titulo',
              //  array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),

                // 'tipo',
                //array('name'=>'nombrefichero','htmlOptions'=>array('width'=>50)),
                // 'enviadoel',
            ),
        )
    ) ; 
   }

   


?>



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>