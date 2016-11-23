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
		
	   
    <div class="row">        
                <?php 			
	echo $form->textField($model,'id',array('disabled'=>'disabled','size'=>3,'maxlength'=>3));
		?>
		<?php 
		         if (!$model->isNewRecord ) {						
				echo $form->textField($model,'correlativo',array('disabled'=>'disabled','size'=>5,'maxlength'=>8));
				 }
		?>
	
		<?php echo $form->labelEx($model,'codtenencia'); ?>
		<?php  
                if($model->isNewRecord){
                   // var_dump($model::PARAM_TENENCIA_POR_DEFECTO);
                   
                }else{
                   
                    if(is_null(Configuracion::valor(
                                    $model->codocu,
                                     $model->codlocal, 
                                    $model::PARAM_TENENCIA_POR_DEFECTO))){
                     $this->widget('ext.matchcode.MatchCode',array(		
					'nombrecampo'=>'codtenencia',
					'ordencampo'=>1,
					//'defol'=>(isset(Yii::app()->session['codprov']))?Yii::app()->session['codprov']:'',
					//'defol2'=>isset(Yii::app()->session['desprov'])?Yii::app()->session['desprov']:'',
					'controlador'=>$this->id,
					'relaciones'=>$model->relations(),
					'tamano'=>2,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'cocity',
					)

					);
                     
                     }else{
                    
                    echo $form->textField($model,'codtenencia',array('size'=>2,'disabled'=>'disabled')); 
                        echo Chtml::textField('idtextenencfia',$model->tenencias->deste,array('size'=>30,'disabled'=>'disabled')); 
                         
                }
                  }
                
                ?>
		<?php echo $form->error($model,'codtenencia'); ?>
	</div>
    
    
    
    
    
     <div class="row">
		
		<?php  
                if(!$model->isNewRecord and count($model->procesoactivo)>0){
                    echo Chtml::label("Proceso Actual:","4nfkg85");
                echo Chtml::textField('idtextyyenencfia',$model->procesoactivo[0]->tenenciasproc->eventos->descripcion,array('size'=>30,'disabled'=>'disabled')); 
                   echo Chtml::textField('ivbgetcfia',$model->procesoactivo[0]->tenenciastrab->trabajadores->ap,array('size'=>30,'disabled'=>'disabled')); 
                      if(!$esfinal) ///si no es final enornce spina semaforo
                      {$this->widget('ext.semaforo.Semaforo',
                      array(
                          'valores'=>ARRAY(0,$model->procesoactivo[0]->tenenciasproc->nhorasverde,$model->procesoactivo[0]->tenenciasproc->nhorasnaranja),
                              'asc'=>-1,
                             'valor'=>$model->procesoactivo[0]->horaspasadas(),
                      )
                        ); 
                       echo Chtml::textField('idtex45encfia',$model->procesoactivo[0]->tiempopasado(),array('size'=>9,'disabled'=>'disabled')); 
                  
                      }else{ //en caso de ser final
                        echo Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/'.'45070.png','',array('width'=>25,'height'=>25)); 
                     
                      }
                    
                }
               		
                ?>
		
	</div>
    
    
    <div class="panelizquierdo">
        
        <div class="row">
		<?php echo $form->labelEx($model,'codlocal'); ?>
		<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codlocal',$datos, array('empty'=>'--Llene el centro--',
               /* 'options'=>array(
		 isset(Yii::app()->session['codlocal'])?Yii::app()->session['codlocal']:''=>array('selected'=>true)
		) */ ));
					?>
		<?php echo $form->error($model,'codlocal'); ?>
	</div>
        
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'codprov'); ?>
            
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
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'coci',
													)

								);
		?>
            
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
													'dateFormat'=>'dd-mm-yy',
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
					),
					'htmlOptions'=>array(
							//'value'=>(  ($model->isNewRecord ) and    isset(Yii::app()->session["fechain"]) ) ?Yii::app()->session["fechain"]:$model->fechain,
						'style'=>'width:80px;vertical-align:top',
						'readonly'=>'readonly',
				 
					),
				));

		?>	
		<?php echo $form->error($model,'fechain'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'conservarvalor'); ?>
		<?php echo $form->checkBox($model,'conservarvalor',array('value'=>'1')); ?>
		
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
            if(strlen($model->procesoactivo[0]->codocuref)>0){
               echo  $this->renderPartial('//site/celular', array('form'=>$form,'model'=>$model),TRUE);
             
             }else{  ?>
            <div style="font-family:verdana;color:#000; font-size: 13px; text-shadow: #aaa 1px 0px 1px;border-style:solid;border-radius:8px; margin:6px;padding:6px;width:350px;background-color:#f3f3eb; border-color:#ffce08;border-width:1px;">
		No puede subir archivos, mientras no especifique el tipo y el 
                 Número de documento en el proceso activo  <?php
                echo $model->procesoactivo[0]->tenenciasproc->eventos->descripcion
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
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'descorta'); ?>
		<?php echo $form->textField($model,'descorta',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'descorta'); ?>
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
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
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
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fhevfrdfa3gt4jfdxxsfdf',
		)); ?>
		
	

            
            
            
            
            
		
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'codteniente'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codteniente',
			'ordencampo'=>1,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'f4vfr23gt4jfdxxsfdf',
		)); ?>
		<?php echo $form->error($model,'codteniente'); ?>
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
   if(!$model->isNewRecord){
       $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'procesos-grid',
            'dataProvider'=> Procesosdocu::model()->search_por_docu($model->id),
             'itemsCssClass'=>'table table-striped table-bordered table-hover', 
           'columns'=>array(
               // 'fechanominal',
              
                
               ARRAY('name'=>'iduser','type'=>'raw','value'=>'CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."page_white_edit.png"),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/docingresados/modificaproceso\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )','htmlOptions'=>array('width'=>3)),

               array(
			'name'=>'fechanominal',
			'value'=>'date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>10)
		),
                //array('name'=>'tipo','type'=>'raw','value'=>'($data->tipo=="M")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."email.png"):$data->tipo','htmlOptions'=>array('width'=>50)),
            array('name'=>'proc','type'=>'raw','value'=>'($data->tenenciasproc->eventos->descripcion)','htmlOptions'=>array('width'=>250)),
             array('name'=>'trab','type'=>'raw','value'=>'($data->tenenciastrab->trabajadores->ap)','htmlOptions'=>array('width'=>30)),
             array('name'=>'codocuref','type'=>'raw','value'=>'$data->documentos->desdocu','htmlOptions'=>array('width'=>150)),
            array('name'=>'numdocref','type'=>'raw','value'=>'$data->numdocref','htmlOptions'=>array('width'=>10)),
            array(
			'name'=>'fechafin',
			'value'=>'(!is_null($data->fechafin))?date("d/m/y", strtotime($data->fechafin)):"--"','htmlOptions'=>array('width'=>10)
		),
               array('name'=>'tiempo','type'=>'raw','value'=>'($data->tiempopasado())','htmlOptions'=>array('width'=>120)),
            array('name'=>'iduser', 'type'=>'html','value'=>'$data->iduser.CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business.png","",array())'),
        
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