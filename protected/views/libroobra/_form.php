<?php
/* @var $this LibroobraController */
/* @var $model Libroobra */
/* @var $form CActiveForm */
?>
<div class="division"><div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'libroobra-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hidot'); ?>
            <?php if($model->escampohabilitado('hidot')){
		
		$this->widget('ext.matchcode.MatchCode',array(
                'nombrecampo'=>'hidot',
                'ordencampo'=>18,
                'controlador'=>$this->id,
                'relaciones'=>$model->relations(),
                'tamano'=>1,
                'model'=>$model,
                'form'=>$form,
                'nombredialogo'=>'cru-dialog3',
                'nombreframe'=>'cru-frame3',
                'nombrearea'=>'ce89',
            )

        );
               
           } else {
              CHtml::textField(uinqid(),$model->ot->numero); CHtml::textField(uinqid(),$model->ot->descripcion);
            
            }
            ?>
		<?php echo $form->error($model,'hidot'); ?>
	</div>
    
    <div class="row">

		<?php echo $form->labelEx($model,'hidetot'); ?>
		<?php //echo var_dump($model->detot->textoactividad); die();?>
		<?php
                if(!$model->isNewRecord){
		$criterio=new CDbCriteria;
		$criterio->addcondition("hidorden=".$model->hidot."");
		$datos1 = CHtml::listData(Detot::model()->findAll($criterio),'id','textoactividad');
                }else{
                    $datos1=array();
                }
		echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl('Libroobra/itemsot'), array(
				'type' => 'POST',
				'url' => CController::createUrl('Libroobra/itemsot'), //  la acción que va a cargar el segundo div
				'update' => '#Libroobra_hidetot', // el div que etidototse va a actualizar
				'data'=>array('idot'=>'js:Libroobra_hidot.value'),
			)

		);
		echo $form->DropDownList($model,'hidetot',$datos1, array('empty'=>'--Seleccione Item--' ) ) ;



		?>
		<?php echo $form->error($model,'idcontacto'); ?>
		
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'codtra'); 		
		$this->widget('ext.matchcode.MatchCode',array(
                'nombrecampo'=>'codtra',
                'ordencampo'=>2,
                'controlador'=>$this->id,
                'relaciones'=>$model->relations(),
                'tamano'=>8,
                'model'=>$model,
                'form'=>$form,
                'nombredialogo'=>'cru-dialog3',
                'nombreframe'=>'cru-frame3',
                'nombrearea'=>'ce89r556',
            )

        );               
          
            ?>
		<?php echo $form->error($model,'codtra'); ?>
	</div>
    
    

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                //'name'=>'my_date',
                'model'=>$model,
                'attribute'=>'fecha',
                'language'=>Yii::app()->language=='es' ? 'es' : null,
                'options'=>array(
                    'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
                    'showOn'=>'button', // 'focus', 'button', 'both'
                    'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
                    'buttonImageOnly'=>true,
                    'dateFormat'=>'yy-mm-dd',
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
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php echo $form->textField($model,'texto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hinicio'); ?>
		 <?php $this->widget('application.extensions.timepicker.timepicker', array(
                'model'=>$model, 'name'=>'hinicio', 
                     'select'=> 'time',
            'options' => array(
            'showOn'=>'focus',
                'timeFormat'=>'hh:mm',
                'hourMin'=> 0,
                'hourMax'=> 24,
                 'language' => 'es',
                //'hourGrid'=>2,
                //'minuteGrid'=>10,
            ),
                
                    )); ?>    
		<?php echo $form->error($model,'hinicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hfinal'); ?>
		<?php $this->widget('application.extensions.timepicker.timepicker', array(
                'model'=>$model, 'name'=>'hfinal', 
                     'select'=> 'time',
            'options' => array(
            'showOn'=>'focus',
                'timeFormat'=>'hh:mm',
                'hourMin'=> 0,
                'hourMax'=> 24,
                 'language' => 'es',
                //'hourGrid'=>2,
                //'minuteGrid'=>10,
            ),
                
                    )); ?>    		<?php echo $form->error($model,'hfinal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temperatura'); ?>
		<?php echo $form->textField($model,'temperatura'); ?>
		<?php echo $form->error($model,'temperatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hr'); ?>
		<?php echo $form->textField($model,'hr'); ?>
		<?php echo $form->error($model,'hr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lluvias'); ?>
		<?php echo $form->textField($model,'lluvias',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'lluvias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'viento'); ?>
		<?php echo $form->textField($model,'viento',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'viento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hiddireccion'); ?>
            <?php
		$this->widget('ext.matchcode.MatchCode',array(
                'nombrecampo'=>'hiddireccion',
                'ordencampo'=>1,
                'controlador'=>$this->id,
                'relaciones'=>$model->relations(),
                'tamano'=>1,
                'model'=>$model,
                'form'=>$form,
                'nombredialogo'=>'cru-dialog3',
                'nombreframe'=>'cru-frame3',
                'nombrearea'=>'c89',
            )

        );
                ?>
		<?php echo $form->error($model,'hiddireccion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --></div></div>

<?php
  if(!$model->isNewRecord){
 
$this->widget('zii.widgets.jui.CJuiTabs', array(
		'theme' => 'default',
		'tabs' => array(
			'Personas'=>array('id'=>'tab_',
				'content'=>$this->renderPartial('tab_personas', array('form'=>$form,'model'=>$model),TRUE)
			),
			'Mano de Obra'=>array('id'=>'tab_ui',
				'content'=>$this->renderPartial('tab_obreros', array('form'=>$form,'model'=>$model),TRUE)
			),
                    
                    'Eventos'=>array('id'=>'tab_uifre4',
				'content'=>$this->renderPartial('tab_eventos', array('form'=>$form,'model'=>$model),TRUE)
			),
                    
                    'Recepciones'=>array('id'=>'tab_uifre5',
				'content'=>$this->renderPartial('tab_neot', array(),TRUE)
			),
                    
                    
                    'Registro visual'=>array('id'=>'tab_img',
				'content'=>$this->renderPartial('tab_images', array('model'=>$model),TRUE)
			),

		),
		'options' => array('overflow'=>'auto','collapsible' => false,),
		'id'=>'MyTabi',)
);

 }
?>
  



<?php
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
			'id'=>'cru-dialog3',
			'options'=>array(
				'title'=>'Explorador',
				'autoOpen'=>false,
				'modal'=>true,
				'width'=>800,
				'height'=>600,
			),
		));
		?>
		<iframe id="cru-frame3" width="100%" height="100%"></iframe>
		<?php
		$this->endWidget();?>




	