

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detalleoc-form',

	//'enableAjaxValidation'=>true,
	



)); ?>
<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
	$botones = array(
	'save' => array(
	'type' => 'A',
	'ruta' => array(),
	'visiblex' => array('10'),
	),

    'calendar' => array(
		'type' => 'D', //AJAX LINK
		'ruta' => array($this->id.'/colocaloteultimo', array('idlote' => $model->id)),
		'opajax' => array(
		'type' => 'GET',
		'success' => 'function(){
                $("#sss").value=3333378;
                      }'
		),
          'visiblex' => array('10'),
                ),
        'ok' => array(
		'type' => 'D', //AJAX LINK
		'ruta' => array($this->id.'/colocaloteultimo', array('idlote' => $model->id)),
		'opajax' => array(
		'type' => 'GET',
		'success' => 'function(){
                $("#sss").value=3333378;
                      }'
		),
            'visiblex' => array('10'),
                ),    
             'tacho' => array(
		'type' => 'D', //AJAX LINK
		'ruta' => array($this->id.'/colocaloteultimo', array('idlote' => $model->id)),
		'opajax' => array(
		'type' => 'GET',
		'success' => 'function(){
                $("#sss").value=3333378;
                      }'
		),
            'visiblex' => array('10'),
                ),  
            
            'camera' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/tomafoto', array(
                                'id' => $model->idtemp,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog3',
                            'frame' => 'cru-frame3',
                            'visiblex' => array('10'),

                        ),
            
              'money' => array(
                            'type' => 'C',
                            'ruta' => array($this->id . '/imputa', array(
                                'id' => $model->idtemp,
                                //"id"=>$model->n_direc,
                                "asDialog" => 1,
                                "gridId" => 'detalle-grid',
                            )
                            ),
                            'dialog' => 'cru-dialog3',
                            'frame' => 'cru-frame3',
                            'visiblex' => array('10'),

                        ),
            
	);

		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>'10',

			)
		);

	?>
</div>



	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php  //$datos1tb1x = CHtml::listData(Masterrelacion::model()->findAll("hidhijo=:orden   ",array(":orden"=>$model->ot->objetosmaster->masterequipo->codigo)),'hidpadre','padre.descripcion');
		echo $form->DropDownList($model,'tipo',
			array(
				'C'=>'Servicio de campo',
				'T'=>'Servicio de Taller',
				'A'=>'Asesoria Tecnica',
			), array('empty'=>'--Seleccione un tipo--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>
<div class="row">
    <?php if(!$model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'codestado'); ?>
		<?php echo CHtml::textField('modeldgdgd',$model->estado->estado,array('disabled'=>($editable)?'':'disabled')); ?>
    <?php } ?>	
	</div>

<div class="row">

						<?php echo $form->labelEx($model,'item'); ?>
						<?php echo $form->textField($model,'item',array('size'=>3,'disabled'=>'disabled')); ?>
</div>
    
    <div class="row">
        <?php 
        if(!empty($model->ot->codcompo)){
        echo $form->labelEx($model,'codmaster'); ?>

		<?php 
               $datos1tb1x = CHtml::listData(Masterequipo::model()->findAll("codigopadre=:vpadre",array(":vpadre"=>$model->ot->codcompo)),'codigo','descripcion');
		echo $form->DropDownList($model,'codmaster',$datos1tb1x, array('empty'=>'--Seleccione un componente--')  )  ;
		
                
                /*$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codmaster',
                    'nombrecamporemoto'=>'codigo',
			'ordencampo'=>3,
			'controlador'=>$this->id,
			'relaciones'=>$model->relations(),
			'tamano'=>8,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'f6ghhfg23ghdfssesj',
		));*/
		?>
	

	<?php echo $form->error($model,'codmaster'); 
        }
        ?>
	</div>      
    
    
    
    
    <div class="row">
        
        <?php echo CHtml::label('Avance','Avance (%)'); ?>
        <?php 
$this->widget('zii.widgets.jui.CJuiSliderInput', array(
    'model'=>$model,
    'attribute'=>'avance',
    'name'=>'my_slider',
    'value'=>$model->avance,
    'event'=>'change',
    'options'=>array(
        'min'=>0,
        'max'=>100,
        'slide'=>'js:function(event,ui){$("#amount").text(ui.value);}',
    ),
    'htmlOptions'=>array(
        'style'=>'width:400px; float:left;'
    ),
));
?>
        <div id="amount" >
            
        </div>

    </div> 
	
    <div class="row">
		<?php echo $form->labelEx($model,'idlabor'); ?>
		
		<?php 
						
			$this->widget('ext.matchcode1.MatchCode1',array(		
												'nombrecampo'=>'idlabor',
												'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar 
												'ordencampo'=>1,
												'controlador'=>'Tempdetot',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'habilitado'=>true,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'mifvfuufu',
											'nombrecampoareemplazar'=>'textoactividad',
											//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
													));
				?>
                                    
                        <?php echo $form->error($model,'idlabor'); ?>
	
		
	</div>

    
    
    
    
	<div class="row">
		<?php echo $form->labelEx($model,'txt'); ?>
		 <?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'txt',
                                )
                            );?>
		<?php echo $form->error($model,'txt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codresponsable'); ?>
		<?php

		if ($this->eseditable($model->codestado)=='')

		{
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'codresponsable',
					'ordencampo'=>1,
					'controlador'=>'Tempdetot',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehe367uudfddj',
				)

			);
		} else{
			echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

		}
		?>
		<?php echo $form->error($model,'codresponsable'); ?>
	</div>


	
	<div class="row">
		<?php echo $form->labelEx($model,'codgrupoplan'); ?>
		<?php  $datos1tb1 = CHtml::listData(Grupoplan::model()->findAll("codcen=:orden",array(":orden"=>$model->ot->codcen)),'codgrupo','desgrupo');
		echo $form->DropDownList($model,'codgrupoplan',$datos1tb1, array('empty'=>'--Seleccione un grupo--','disabled'=>$this->eseditable($model->codestado))  )  ;
		?>
		<?php echo $form->error($model,'codgrupoplan'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'nhoras'); ?>
		<?php echo $form->textField($model,'nhoras',array('size'=>4)); ?>
		<?php echo $form->error($model,'nhoras'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhombres'); ?>
		<?php echo $form->textField($model,'nhombres',array('size'=>4)); ?>
		<?php echo $form->error($model,'nhombres'); ?>

	</div>

    
    <div class="row">
						<?php echo $form->labelEx($model,'fechainic'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechainic',
								'value'=>$model->fechainic,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechainic,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'yy-mm-dd',
									'selectOtherMonths'=>true,
									'showAnim'=>'slide',
									'showButtonPanel'=>false,
									'showOtherMonths'=>true,
									'changeMonth' => 'true',
									'changeYear' => 'true',
								),
							)
						);?>
		
					

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechafin',
								'value'=>$model->fechafin,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechafin,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'yy-mm-dd',
									'selectOtherMonths'=>true,
									'showAnim'=>'slide',
									'showButtonPanel'=>false,
									'showOtherMonths'=>true,
									'changeMonth' => 'true',
									'changeYear' => 'true',
								),
							)
						);?>
		
					</div>
    <div class="row">
						<?php echo $form->labelEx($model,'fechainiprog'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechainiprog',
								'value'=>$model->fechainiprog,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechainiprog,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'yy-mm-dd',
									'selectOtherMonths'=>true,
									'showAnim'=>'slide',
									'showButtonPanel'=>false,
									'showOtherMonths'=>true,
									'changeMonth' => 'true',
									'changeYear' => 'true',
								),
							)
						);?>
		
					

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fechafinprog',
								'value'=>$model->fechafinprog,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fechafinprog,
									'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
									'showOn'=>'both', // 'focus', 'button', 'both'
									'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
									'buttonImageOnly'=>true,
									'dateFormat'=>'yy-mm-dd',
									'selectOtherMonths'=>true,
									'showAnim'=>'slide',
									'showButtonPanel'=>false,
									'showOtherMonths'=>true,
									'changeMonth' => 'true',
									'changeYear' => 'true',
								),
							)
						);?>
		
					</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>600,
		'height'=>420,
		'border'=>0,
	),
));
?>
	<iframe id="cru-frame3" style="border:0px; width:100%; height:100%;" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
