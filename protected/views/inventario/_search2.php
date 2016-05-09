<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

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
	
	<div style="height: 25px;margin:0;">
		
		<div style="float: left;">
		<?php echo $form->label($model,'descripcion'); ?>
		</div>
		
		<div style="float: left;  clear right;">
		<?php echo $form->textField($model,'descripcion',array('size'=>20,'maxlength'=>40)); ?>
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
		<?php echo $form->label($model,'codigosap'); ?>
		</div>
		<div style="float: left;  clear right;">
		<?php echo $form->textField($model,'codigosap',array('size'=>20,'maxlength'=>6)); ?>
	    </div>

	   <div style="float: left; ">
		<?php echo $form->label($model,'codigoaf'); ?>
		 </div>
		 <div style="float: left;  ">
		<?php echo $form->textField($model,'codigoaf',array('size'=>30,'maxlength'=>14)); ?>
	   </div>
	   
	 </div>   

	
<div style="height: 25px;margin:0; ">
	<div style="float: left;">	
		<?php echo $form->label($model,'marca'); ?>
	</div>	
	
	<div style="float: left; clear right;">	
		<?php echo $form->textField($model,'marca',array('size'=>15,'maxlength'=>15)); ?>
	</div>

		<div style="float: left;">	
				<?php echo $form->label($model,'modelo'); ?>
		</div>
		<div style="float: left;">	
				<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
		</div>
</div>	
	

	<div class="row">
		<?php echo $form->label($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>20,'maxlength'=>20)); ?>
	</div>

		<div class="row">
	<?php echo $form->label($model,'tipo'); ?>
	<?php  $datos = array('A' => 'Maquinaria de flota ','B'=> 'Equipo operaciones','C'=> 'Muebles oficina','D' => 'Equipos de computo','E' => 'Artefactos oficina');
		  echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->