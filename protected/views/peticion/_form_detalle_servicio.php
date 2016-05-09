<?php
/* @var $this DcotmaterialesController */
/* @var $model Dcotmateriales */
/* @var $form CActiveForm */
?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>TRUE,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,

)); ?>
<?php echo $form->errorSummary($model); ?>
<?PHP

$this->widget('zii.widgets.jui.CJuiTabs', array(
		'tabs' => array(
			'General'=>array('id'=>'tab_general',
				'content'=>$this->renderPartial('tab_detalle_serv', array(
					'model'=>$model,'form'=>$form
				),TRUE)),
			'Detalle'=>array('id'=>'tab_logss',
				'content'=>$this->renderPartial('tab_comentario', array(
					'model'=>$model,'form'=>$form,
				),TRUE)),

		      ),
		'options' => array(	'collapsible' => false,
			'heightStyle'=>'auto',
		      ),
		// set id for this widgets
		'id'=>'MyTabe',
	       )
     );

?>

	<div class="row buttons">
		<?php echo CHtml::submitButton(($model->isNewRecord)?'Agregar' : 'Actualizar',array('onClick'=>'Loading.show();Loading.hide();')); ?>
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
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>