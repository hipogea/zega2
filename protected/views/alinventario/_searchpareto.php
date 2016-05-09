
<div class="division">
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div class="row">
		<?php 
		echo "<div class='botones'>";
		echo CHtmL::imageButton(Yii::app()->getTheme()->baseUrl.'/img/bino.png', array ( ));
			echo "</div>";
          ?>

</div>
	
	 <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'codart',												
												//'ordencampo'=>1,
												'controlador'=>'VwAlinventario',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'nombremodelo'=>'Maestrocompo',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>
	  

	<div class="row">
		<?php echo $form->label($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clase'); ?>
		<?php echo $form->textField($model,'clase',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
	</div>



<?php $this->endWidget(); ?>





<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>700,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

</div><!-- search-form -->
</div><!-- search-form -->


	
