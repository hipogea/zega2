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
		<?php
		$botones=array(
			'search'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('10'),
			),
			'clear'=>array(
				'type'=>'E',
				'ruta'=>array(),
				'visiblex'=>array('10'),
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
		); ?>

	</div>
    
	<div class="panelizquierdo">
	
			  <div class="row">
    <?php  
		$documento='390';
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
	<div class="row">
		<?php echo $form->label($model,'codep'); ?>
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
					echo $form->DropDownList($model,'codep',$datos, array('empty'=>'--Seleccione Dependencia --')  )
					?>
		 </div>
		 
		 <div class="row">
				<?php echo $form->label($model,'codeporiginal'); ?>		
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
						echo $form->DropDownList($model,'codeporiginal',$datos, array('empty'=>'--Original --')  )
				?>
		 </div>
		  <div class="row">
				<?php echo $form->label($model,'codepanterior'); ?>		
				<?php  $datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
						echo $form->DropDownList($model,'codepanterior',$datos, array('empty'=>'--Anterior --')  )
				?>
		 </div>

		<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>40,'maxlength'=>40)); ?>
		</div>
         
	
		
	
	<div class="row">
		<?php //echo $form->label($model,'comentario'); ?>
		<?php //echo $form->textArea($model,'comentario',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	
	<div class="row">
		<?php //echo $form->label($model,'coddocu'); ?>
		
		<?php //echo $form->textField($model,'coddocu',array('size'=>3,'maxlength'=>3)); ?>
	</div>

			<div class="row">
		<?php echo $form->label($model,'idinventario'); ?>
		<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(		
												'nombrecampo'=>'idinventario',												
												//'ordencampo'=>1,
												'controlador'=>'Inventario',
												'relaciones'=>$model->relations(),
												'tamano'=>4,
												'model'=>$model,
												'nombremodelo'=>'Inventario',
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												//'nombrearea'=>'fehdfj',
													)
													
								);  

						
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
		<?php //echo $form->label($model,'rocoto'); ?>
		<?php //echo $form->checkBox($model,'rocoto'); ?>
	 </div>
	   
	  </div>

	<div class="panelderecho">
	<div class="row">
		<?php echo $form->label($model,'marca'); ?>	
		<?php echo $form->textField($model,'marca',array('size'=>20,'maxlength'=>6)); ?>
	   </div>
	
	<div class="row">
		<?php echo $form->label($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>20,'maxlength'=>6)); ?>
	   </div>

	   <div class="row">
		<?php echo $form->label($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('size'=>30,'maxlength'=>14)); ?>
	 </div>
	
	
	<div class="row">
	<?php echo $form->label($model,'tipo'); ?>
	<?php  //$datos = array('A' => 'Maquinaria embarcaciones ','B'=> 'Artefactos operaciones flota','C'=> 'Muebles oficina','D' => 'Equipos de computo','E' => 'Equipos de local','F'=>'Seguridad naval','G'=>'Equipos PAMA');
	$datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');

	echo $form->DropDownList($model,'tipo',$datos, array('empty'=>'--Indique el tipo--')  )  ;	?>
	</div>

	
	<div class="row">
			<?php echo $form->label($model,'lugares_lugar'); ?>
			<?php echo $form->textField($model,'lugares_lugar',array('size'=>25,'maxlength'=>40)); ?>
	</div>
	
	<div class="row">
			<?php echo $form->label($model,'codlugar'); ?>
			<?php  $datos = CHtml::listData(Lugares::model()->findAll(array('condition'=>'codlugar  in (select  codlugar from {{inventario}} where codlugar is not null)','order'=>'deslugar')),'codlugar','deslugar');
					echo $form->DropDownList($model,'codlugar',$datos, array('empty'=>'--Seleccione un lugar --')  );
						?>					
	</div>
	
	
            <br>
            <BR>
            <BR>
            
		
	</div>
	
	</div>
 
<?php $this->endWidget(); ?>


</div><!-- search-form -->
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
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>