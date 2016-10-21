<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajachica-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
    
    <?php if($model->hidcargo >0) {  
         echo $form->hiddenField($model,'tipoflujo', array('value'=>'100') ) ;
		  
    ?>
    <?php }else{  ?>
	<div class="row">
		<?php echo $form->labelEx($model,'tipoflujo'); ?>
		<?php  $datos1 = CHtml::listData(Tipoflujocaja::model()->findAll(),'codtipo','destipo');
		echo $form->DropDownList($model,'tipoflujo',$datos1, array('empty'=>'--Seleccione el tipo--') ) ;
		?>
		<?php echo $form->error($model,'tipoflujo'); ?>
	</div>
 <?php }  ?>



	<?php echo $form->hiddenField($model,'hidcaja',array('value'=>$idcabeza)); ?>


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
				'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
				'buttonImageOnly'=>true,
				'dateFormat'=>'yy-mm-dd',
			),
			'htmlOptions'=>array(
				'style'=>'width:60px;vertical-align:top',
				'readonly'=>'readonly',
			),
		)); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'glosa'); ?>
		<?php echo $form->textField($model,'glosa',ARRAY('size'=>40)); ?>
		<?php echo $form->error($model,'glosa'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',ARRAY('size'=>20)); ?>
		<?php echo $form->error($model,'referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'debe'); ?>
		<?php echo $form->textField($model,'debe',ARRAY('size'=>8)); ?>
		<?php echo $form->error($model,'debe'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'monedahaber'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropdownList($model,'monedahaber',$datos,array('empty'=>'--Seleccione moneda--','disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'monedahaber'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo CHtml::textField('hsfjjfsj',"  ".yii::app()->params['monedabase']." - ".MiFactoria::decimal($model->monto),ARRAY('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'haber'); ?>
		<?php echo $form->textField($model,'haber',ARRAY('size'=>20)); ?>
		<?php echo $form->error($model,'haber'); ?>
	</div>


    <?php if($model->hidcargo >0) {  
         echo $form->hiddenField($model,'codtra', array('value'=>Yii::app()->user->getField('codtra')) ) ;
		  
    ?>
    <?php }else{  ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'codtra'); ?>
		<?php
		$this->widget('ext.matchcode.MatchCode',array(
			'nombrecampo'=>'codtra',
			'ordencampo'=>1,
			'controlador'=>'Dcajachica',
			'relaciones'=>$model->relations(),
			'tamano'=>6,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'fernfa3gt4jfdxxsfdf',
		)); ?>
		<?php echo $form->error($model,'codtra'); ?>
	</div>
    <?php } ?>

<div class="row">
		<?php echo $form->labelEx($model,'tipimputacion'); ?>
		<?php  $datos = CHtml::listData(Tipimputa::model()->findAll(array('order'=>'desimputa')),'codimpu','desimputa');
		  echo $form->DropDownList($model,'tipimputacion',$datos, array(  'ajax' => array('type' => 'POST', 
									    'url' => CController::createUrl($this->id.'/cargaimputacion'),
                                                                                'data'=>array(
                                                                                    'tipo'=>'js:Dcajachica_tipimputacion.value',
                                                                                   'formula'=>base64_encode(serialize($form)), 
                                                                                ),
                                                                                //  la acción que va a cargar el segundo div 
									    'update' => '#colector' // el div que se va a actualizar
											  ),
									  'empty'=>'--Seleccione imputacion--',) ) ;
		?>
		<?php echo $form->error($model,'tipimputacion'); ?>
	</div>
    <div id="colector"></div>
    
    <?PHP
      IF(!$model->isNewRecord){
          if($model->tipimputacion=='T'){
              $this->renderpartial('imputacion_Ot',array('form'=>$form,'model'=>$model));
          }
          if($model->tipimputacion=='K'){
              $this->renderpartial('imputacion_Cc',array('form'=>$form,'model'=>$model));
          }
          if($model->tipimputacion=='B'){
              $this->renderpartial('imputacion_Cc',array('form'=>$form,'model'=>$model));
          }
          
           }
    ?>
    
	

	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php  $datos1 = CHtml::listData(Documentos::model()->findAll("comprobante='1'"),'coddocu','desdocu');
		echo $form->DropDownList($model,'codocu',$datos1, array('empty'=>'--Seleccione comprobante--') ) ;
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>
























<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
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

$this->endWidget();
//--------------------- end new code --------------------------
?>