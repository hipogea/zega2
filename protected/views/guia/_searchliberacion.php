<?php
/* @var $this CotiController */
/* @var $model Coti */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class='division_1'>
				<div style="float: left; ">
			        <?php echo $form->labelEx($model,'cod_cen'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(),'cod_cen','nomcen');
					echo $form->DropDownList($model,'cod_cen',$datos, array('empty'=>'--Seleccione un centro --')  )
					?>
				</div>	
				<div class="row">
					<?php echo $form->label($model,'c_texto'); ?>
					<?php echo $form->textField($model,'c_texto',array('size'=>30,'maxlength'=>30)); ?>
				</div>

				<div class="row">
					<?php // echo $form->label($model,'c_serie'); ?>
					<?php //echo $form->textField($model,'c_serie',array('size'=>4,'maxlength'=>4)); ?>
				</div>

	
				<div class="row">
					<?php echo $form->label($model,'c_numgui'); ?>
					<?php echo $form->textField($model,'c_numgui',array('size'=>12,'maxlength'=>12)); ?>
				</div>
	
				<div class="row">
					<?php echo $form->label($model,'razondestinatario'); ?>
					<?php echo $form->textField($model,'razondestinatario',array('size'=>25,'maxlength'=>14)); ?>
				</div>

		</div>

		<div class='division_2'>
					
	
					<div style="float: left; ">
			        		<?php //echo $form->labelEx($model,'c_codep'); ?>
							<?php  //$datos = CHtml::listData(Embarcaciones::model()->findAll(array('order'=>'nomep')),'codep','nomep');
							//echo //$form->DropDownList($model,'c_codep',$datos, array('empty'=>'--Seleccione una Embarcacion --')  )
							?>
					</div>
	
	
	
					<div class="row buttons">
								<?php echo CHtml::submitButton('Buscar'); ?>
					</div>


		</div>
			<?php $this->endWidget(); ?>

</div>



