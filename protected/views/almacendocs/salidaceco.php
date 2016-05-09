<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacendocs-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Grabar',array('class'=>'botoncito')); ?>
	</div>






<div class="row">
		<?php if( $model->cestadovale=='99' or $model->cestadovale=='01' ) {
		echo "<div class='botones'>";
		 echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/save.png',array('value'=>(!$model->isNewRecord) ?'Crear':'Grabar')); 
		echo "</div>";
		echo "<div class='botones'>";
		 echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/contar.png'),array('/solpe/imprimir2','id'=>$model->id)); 
		echo "</div>";
           }
          ?>

		<?php if($model->cestadovale==null  ) {
		echo "<div class='botones'>";
		 echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/siga.png',array('value'=>(!$model->isNewRecord) ?'Crear':'Grabar')); 
		echo "</div>";
           }
          ?>
		<?php if($model->cestadovale=='02' ) {
		echo "<div class='botones'>";
		 echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/imprimir.png'),array('/solpe/imprimir2','id'=>$model->id)); 
		echo "</div>";
           }
          ?>
          <?php if($model->cestadovale=='01' ) {
		echo "<div class='botones'>";
	 		echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/ok.png'),array('/solpe/procesarsolpe','id'=>$model->id,'ev'=>60)); 
		 echo "</div>";
           }
          ?>

           <?php if($model->cestadovale=='01' ) {
		echo "<div class='botones'>";
		echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/tacho1.png'),array('/solpe/procesarsolpe','id'=>$model->id,'ev'=>61)); 
		
		echo "</div>";
           }
          ?>


	</div>




<div class="panelizquierdo">

	<div class="row">
		<?php echo $form->labelEx($model,'numvale'); ?>
		<?php echo $form->textField($model,'numvale',array('size'=>12,'maxlength'=>12 ,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'numvale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechavale'); ?>
		<?php if($model->isNewRecord) { ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechavale',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															)); ?>
		<?php echo $form->error($model,'fechavale'); ?>
		<?php  } else {
				echo $form->textfield($model,'fechavale',array('disabled'=>'disabled'));
		}
		?>
	</div>

	
<?php 
			//echo CHtml::hiddenField('opcionmovimiento',$opcionmovimiento); 
	
?>
	
	

	<div class="row">
		<?php echo $form->labelEx($model,'codalmacen'); ?>
		<?php 
			echo $form->textField($model,'codalmacen',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'codalmacen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
	<?php  
					 if($model->isNewRecord) { 
				$datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		 			 echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione un centro--',  
													    ) ) ;
										} else {
							echo $form->textField($model,'codcentro',array('size'=>4));
		 			 			}
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>

</div>
<div class="panelderecho">


	<div class="row">
		<?php echo $form->labelEx($model,'codestadovale'); ?>
		
		<?php 
			if(!$model->isNewRecord)
			 {

			  
		       
		     echo CHtml::textField('hola',
			  Estado::model()->find('codestado=:miestado and codocu=:midocumento',array(':midocumento'=>'010',':miestado'=>$model->cestadovale))->estado,
			  array('disabled'=>'disabled','size'=>20));
			 
			 
		
			 }

		 ?>
		
	</div>

	

	

	<div class="row">
		<?php echo $form->labelEx($model,'fechacont'); ?>
		<?php  
			if($model->isNewRecord) {
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechacont',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),													
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:60px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));
								}else {
									echo CHtml::textfield('hkshf',$model->fechacont,array('disabled'=>'disabled','size'=>15));
								}

															 ?>
		<?php echo $form->error($model,'fechacont'); ?>

	</div>

	<div class="row">
		<?php 

			if (!$model->isNewRecord) {
								echo $form->labelEx($model,'fechacre');
								 echo $form->textField($model,'fechacre',array('disabled'=>'disabled','size'=>15));
		 				
									}
									?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>15,'maxlength'=>15,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'ceco'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codtrabajador'); ?>
		<?php echo $form->textField($model,'codtrabajador',array('size'=>4,'maxlength'=>4,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'codtrabajador'); ?>
	</div>
	



</div>



	

	<?php if ( !$model->isNewRecord )  {
				  
				$this->renderpartial('vw_detalle_vale',array('campoestado'=>'cestadovale','model'=>$model,'eseditable'=>$this->eseditable($model->cestadovale)));  
				  
				}
     ?>

   

<?php $this->endWidget(); ?>
</div>

</div>