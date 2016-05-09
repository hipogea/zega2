<?php
/* @var $this CarterescambioController */
/* @var $model Carterescambio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'carterescambio-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>

	
	
	
<?php 

$modeloinv=Vwaceites::model()->findByAttributes(array('id'=> $model->id));

?>
	<div class="row">
		<?php echo CHtml::label($modeloinv->nomep,false,array('as'=>12)); ?>
		<?php echo CHtml::label($modeloinv->descripcion,false,array('as'=>12)); ?>
		<?php echo CHtml::label($modeloinv->material,false,array('as'=>12)); ?>
		<?php echo CHtml::label($modeloinv->horascambio,false,array('as'=>12)); ?>
	</div>	  
<div class="row"> 
	<div  style="float: left; width:300px; border :1px;"> 
					<div style="float: left; width:200px;">		 
						<div class="row">
						    <?php 
							  // $auxil=$model->fucambio; //esto para guardar el valor origianl del modelo, que cuando valide con el post, no pinte los datos ingresados 
							   echo $form->labelEx($model,'Ultima lectura   :  '. date("d/m/Y",strtotime($fulecturaant))); 
							  
							   ?>
						</div>	
						<div class="row">
							<?php //echo $form->labelEx($model,'fucambio'); ?>
							
							
							
							
							
							
							
							<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,
								'attribute'=>'fulectura',								
								'language'=>'es',

								// additional javascript options for the date picker plugin
								'options'=>array(
								'showAnim'=>'fold',
								'showOn'=>'button',
								'buttonText'=>Yii::t('ui','...'),
								'showButtonPanel'=>true,
								'autoSize'=>true,
								'dateFormat'=>'yy-mm-dd',
								'value'=>'',
									),
									'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															'value'=>'',
															),
									
									));
							?>
							<?php echo $form->error($model,'fulectura'); ?>
						</div>
						<div class="row">	
							<?php echo $form->labelEx($model,'Ultimo horometro :'.$horometroant); ?>
							<?php  //echo $form->labelEx($model,'hucambio'); ?>
							<?php echo $form->textField($model,'horometro',array('value'=>'')); ?>
							<?php echo $form->error($model,'horometro'); ?>
						</div>
					</div>
					<div style="float: left; clear:right; width:100px;">
							<?php echo CHtml::image($ruta=Yii::app()->params['rutaimagenes']."reloj.jpg","",array('border'=>0,'width'=>60,'height'=>60));?>

								<?php  
								echo CHtml::label("Utimas lecturas :",false,array('as'=>12));
								?>		
									<?php $this->widget('zii.widgets.grid.CGridView', array(
											'id'=>'inventario-grid',
												//'filter'=>$model,
											'summaryText'=>'',
											'dataProvider'=>VwUltimashoras::model()->search($modeloinv->idequipo),	
												//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
											'columns'=>array(
												
											//array('name'=>'fechaarribo', 'value'=>'date_format(date_create($data->fechaarribo), "d-m-Y")',),
											array('name'=>'fulectura', 'value'=>'date("d/m/Y",strtotime($data->fulectura))',),
											'horometro',
												),
														)); 
											?>
				</div>
		</div>
</div>	
	<div  > 
			<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ca' : 'Actualizar horometro'); ?>
	</div>		
	  
	</div>
	
	
	
	
	

	

<?php $this->endWidget(); ?>

</div><!-- form -->