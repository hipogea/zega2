


<div class="division">

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
  <FIELDSET>
	<div class="row">
		<?php //echo $form->label($model,'idinventario'); ?>
		<?php //echo $form->textField($model,'idinventario'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'codigo'); ?>
		<?php //echo $form->textField($model,'codigo',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'c_estado'); ?>
		<?php //echo $form->textField($model,'c_estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'despro'); ?>
		<?php echo $form->textField($model,'despro',array('size'=>40,'maxlength'=>40)); ?>
	</div>
	
	
	
	<div style="height: 25px;margin:0;">
		
		<div style="float: left;">
		<?php echo $form->label($model,'descorta'); ?>
		</div>
		
		<div style="float: left;  clear right;">
		<?php echo $form->textField($model,'descorta',array('size'=>20,'maxlength'=>40)); ?>
		</div>

	
		<div style="float: left; ">
		<?php echo $form->label($model,'codep'); ?>
		</div>
		
		<div style="float: left; ">
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codepv',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
					?>
		</div>
	</div>
	<div class="row">
		<?php //echo $form->label($model,'comentario'); ?>
		<?php //echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	
	<div class="row">
		<?php //echo $form->label($model,'coddocu'); ?>
		
		<?php //echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	
   <div style="height: 25px;margin:0;">
		
		<div style="float: left;">	
		<?php echo $form->label($model,'numero'); ?>
		</div>
		<div style="float: left;  clear right;">
		<?php echo $form->textField($model,'numero',array('size'=>20,'maxlength'=>20)); ?>
	    </div>

	   <div style="float: left; ">
		<?php echo $form->label($model,'docref'); ?>
		 </div>
		 <div style="float: left;  ">
		<?php echo $form->textField($model,'docref',array('size'=>30,'maxlength'=>14)); ?>
	   </div>
	   
	 </div>   

	
<div style="height: 25px;margin:0; ">
	<div style="float: left;">	
		<?php echo $form->label($model,'responsable'); ?>
	</div>	
	
	<div style="float: left; clear right;">	
		<?php echo $form->textField($model,'responsable',array('size'=>15,'maxlength'=>15)); ?>
	</div>

		<div style="float: left;">	
				<?php echo $form->label($model,'rucpro'); ?>
		</div>
		<div style="float: left;">	
				<?php echo $form->textField($model,'rucpro',array('size'=>11,'maxlength'=>11)); ?>
		</div>
</div>	
	

	<div class="row">
		<?php echo $form->label($model,'correlativo'); ?>
		<?php echo $form->textField($model,'correlativo',array('size'=>8,'maxlength'=>8)); ?>
	</div>
  
  	<div class="row">
		<?php echo $form->labelEx($model,'fechain'); ?>
		
		<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 <?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'fechain',
 'value'=>$model->fechain,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->fechain,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold',
 //'buttonImage'=>Yii::app()->baseUrl.'/images/calendar.png',
 //'buttonImageOnly'=>true,
 //'buttonText'=>'Fecha',
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>
	
	
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'fechain'); ?>
		
		
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 array(
 'model'=>$model,
 'attribute'=>'d_fectra1',
 'value'=>$model->d_fectra1,
 'language' => 'es',
 'htmlOptions' => array('readonly'=>"readonly"),
 'options'=>array(
 'autoSize'=>true,
 'defaultDate'=>$model->d_fectra1,
 'dateFormat'=>'yy-mm-dd',
 'showAnim'=>'fold', 
 'selectOtherMonths'=>true,
 'showAnim'=>'slide',
 'showButtonPanel'=>true,
 'showOn'=>'button',
 'showOtherMonths'=>true,
 'changeMonth' => 'true',
 'changeYear' => 'true',
 ),
 )
);?>


		
	</div>
  
	
	<div class="row">
	<?php echo $form->label($model,'moneda'); ?>
	<?php  $datos = array('D' => 'Dolares ','S'=> 'Soles');
		  
	echo $form->DropDownList($model,'moneda',$datos, array('empty'=>'--Indique la moneda--')  )  ;	?>
	</div>

	
	<div class="row">
			<?php //echo $form->label($model,'lugares_lugar'); ?>
			<?php //echo $form->textField($model,'lugares_lugar',array('size'=>25,'maxlength'=>40)); ?>
													
	</div>
	
	<div class="row">
			<?php echo $form->label($model,'tipodoc'); ?>
			<?php  $datos = CHtml::listData(Documentos::model()->findAll(array("condition"=>"clase='D' ",'order'=>'desDOCU')),'coddocu','desdocu');
					echo $form->DropDownList($model,'tipodoc',$datos, array('empty'=>'--Seleccione un documento --')  );
					//ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
			?>
													
	</div>
	
	
	
	
	<div class="row">
   	</div>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>
 </FIELDSET>
<?php $this->endWidget(); ?>


</div>
</div>












