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
<div class="contenedorbloque">
 <div class="fila">
  <FIELDSET>
	<legend>Datos de b&uacute;squeda</legend>
<div class="bloque">
	 <FIELDSET>
		
	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>		
		<?php echo $form->textField($model,'descripcion',array('size'=>20,'maxlength'=>40)); ?>
	</div>
	
	<div class="row">	
		<?php echo $form->label($model,'codep'); ?>
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codep',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
				?>
	</div>	
	
	
	
      <div class="row">
		<?php echo $form->label($model,'codigosap'); ?>		
		<?php echo $form->textField($model,'codigosap',array('size'=>20,'maxlength'=>6)); ?>
	</div>
		
	  <div class="row">
		<?php echo $form->label($model,'codigoaf'); ?>		
		<?php echo $form->textField($model,'codigoaf',array('size'=>30,'maxlength'=>14)); ?>
	    </div>

		<div class="row">
		<?php echo $form->label($model,'marca'); ?>	
		<?php echo $form->textField($model,'marca',array('size'=>15,'maxlength'=>15)); ?>
		</div>
				<div class="row">
				<?php echo $form->label($model,'modelo'); ?>		
				<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
				</div>
				
		</FIELDSET>
</div>
<div class="bloque" >
		<FIELDSET>		
			<div class="row">	
				<?php echo $form->label($model,'codeporiginal'); ?>
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codeporiginal',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
				?>
			</div>	
				<div class="row">	
				<?php echo $form->label($model,'codepanterior'); ?>
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codepanterior',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
				?>
			</div>
		<div class="row">
		<?php echo $form->label($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php  $datos = array('A' => 'Maquinaria embarcaciones ','B'=> 'Artefactos operaciones flota','C'=> 'Muebles oficina','D' => 'Equipos de computo','E' => 'Equipos de local','F'=>'Seguridad naval','G'=>'Equipos PAMA');
		  echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
	
	</div>
	
		<div class="row">
			<?php echo $form->label($model,'deslugar'); ?>
			<?php echo $form->textField($model,'deslugar',array('size'=>25,'maxlength'=>40)); ?>
		</div>											
	<div class="row">
			<?php echo $form->label($model,'codlugar'); ?>
			<?php  $datos = CHtml::listData(Lugares::model()->findAll(array('condition'=>'codlugar  in (select  codlugar from '.Yii::app()->params['prefijo'].'inventario where codlugar is not null)','order'=>'deslugar')),'codlugar','deslugar');
					echo $form->DropDownList($model,'codlugar',$datos, array('empty'=>'--Seleccione un lugar --')  );
					ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."nuevo.gif","",array("width"=>30,"height"=>15));
			?>
	</div>												
	
	
	
	
	
	<div class="row">
    <?php  
		$documento='032';
		$criteria = new CDbCriteria;
		$criteria->condition='codocu=:docu';
		$criteria->params=array(':docu'=>$documento);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
	    echo $form->label($model,'codestado'); 
		 $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
		 				 echo $form->DropDownList($model,'codestado',$datos, array('empty'=>'--Indique el status--')  )  ;	
	?>
	</div>
	<?php echo CHtml::submitButton('Filtrar',array('class'=>'botoncito')); ?>
    	</FIELDSET>
</div>

 </FIELDSET>
 </div>
 </div>
		
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->