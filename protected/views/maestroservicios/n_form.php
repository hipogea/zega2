<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacendocs-form',
	//'action'=>Yii::app()->createUrl('/Almacendocs/'.$movimiento),
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<?php // echo "<br><br><br><br>  ".($model->isnewRecord)?"ES NUEVO - EN EL FORM ":"YA NO ES NUVEO EN EL FOMRN";?>
	<?php //echo "el escenario es : ".$model->getScenario(); ?>
	<div class="row">
		<?php
               // VAR_DUMP(ESTADO_PREVIO);DIE();
		$botones=array(
			'go'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array('99'   ,NUll),
			),
			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array(ESTADO_CREADO),
			),



			'print'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/imprimir',array('id'=>$model->id)),
				'visiblex'=>array(ESTADO_EFECTUADO),
			),
			'tacho'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/anular',array('id'=>$model->id)),
				'visiblex'=>array(ESTADO_EFECTUADO),
			),
			'add'=>array(
				'type'=>'C',
				'ruta'=>array($this->id.'/creadetalle',array(
					'idcabeza'=>$model->id,"cest"=>'01',
					//"id"=>$model->n_direc,
					"asDialog"=>1,
					"gridId"=>'detalle-grid',
				)
				),
				'dialog'=>'cru-dialogdetalle',
				'frame'=>'cru-detalle',
				'visiblex'=>array(ESTADO_CREADO),

			),
			'out'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
				'visiblex'=>array(ESTADO_PREVIO,ESTADO_CREADO,ESTADO_EFECTUADO),
			),

		);

		$this->widget('ext.toolbar.Barra',
			array(
				//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
				'botones'=>$botones,
				'size'=>24,
				'extension'=>'png',
				'status'=>$model->cestadovale,

			)
		);?>

	</div>



<div class="panelizquierdo">

	<div class="row">
		<?php echo $form->labelEx($model,'numvale'); ?>
		<?php echo $form->textField($model,'numvale',array('size'=>12,'maxlength'=>12 ,'disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'numvale'); ?>
	</div>
	<div class="row">
		<?php //echo "<br><br>  ".($model->isnewRecord)?"ES NUEVO - EN EL FORM-POUIO ABNTS ":"YA NO ES NUVEO  FORM-POUIO ABNTS";?>

		<?php echo $form->labelEx($model,'fechavale'); ?>
		<?php  //echo ($model->isNewRecord)?"<br><br>SI ES NUEVO ":"YA NO ES NUVEO".$model->getPrimaryKey();

		          if($model->isNewRecord) { ?>
		<?php  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fechavale',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
												'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:90px;vertical-align:top',
															'readonly'=>'readonly',
															),
															)); ?>
		<?php echo $form->error($model,'fechavale'); ?>
		<?php  } else {
				echo $form->textfield($model,'fechavale',array('disabled'=>'disabled'));
		}
		?>
	</div>

	



	<div class="row">

		<?php echo $form->labelEx($model,'codmovimiento'); ?>

			<?php echo Chtml::textField(Almacenmovimientos::model()->findByPk($model->codmovimiento)->movimiento,Almacenmovimientos::model()->findByPk($model->codmovimiento)->movimiento,array('disabled'=>'disabled','size'=>30)); ?>
			<?php $form->hiddenField($model,'codmovimiento'); ?>


	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
	<?php  
					 if($model->isNewRecord) { 
				$datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		 			 echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione un centro--',  
													    ) ) ;
										} else {
							echo $form->textField($model,'codcentro',array('size'=>4,'disabled'=>'disabled')); 
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
			 $model->almacendocs_estado->estado,
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
												'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
												'buttonImageOnly'=>true,
												'dateFormat'=>'yy-mm-dd',
														),
												'htmlOptions'=>array(
															'style'=>'width:90px;vertical-align:top',
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

	<?php if($model->isNewRecord){ ?>

		<div class="row">
			<?php	echo $form->labelEx($model,'numdocref'); ?>

			<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
				'nombrecampo'=>'numdocref',
				'controlador'=>'Almacendocs',
				'tamano'=>9,
				'model'=>$model,
				'nombreclase'=>'VwOcompra',
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
			));
			?>
			<?php echo $form->error($model,'numdocref'); ?>
		</div>

	<?php }else {?>
		<div class="row">
			<?php	echo $form->labelEx($model,'numdocref'); ?>
			<?php echo $form->textField($model,'numdocref',array('disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'numdocref'); ?>
		</div>

	<?php } ?>




	<div class="row">
		<?php echo $form->labelEx($model,'codocuref'); ?>
		<?php  
				

		
		?>

		<?php if(is_null($model->codocuref) or empty($model->codocuref)) { ?>
			<?php
			$datos1 = CHtml::listData(Documentos::model()->findAll(array('order'=>'desdocu')),'coddocu','desdocu');
			echo $form->DropDownList($model,'codocuref',$datos1, array('empty'=>'--Seleccione un documento--', 'disabled'=>($model->isNewRecord)?'':'disabled'   ) ) ;

			?>



		<?php  } else { ?>
			<?php echo Chtml::textField('SORA',Almacenmovimientos::model()->findByPk($model->codmovimiento)->documentos->desdocu,array('disabled'=>'disabled','size'=>30)); ?>
			<?php $form->hiddenField($model,'codocuref'); ?>
		<?php  }  ?>





		<?php echo $form->error($model,'codocuref'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php

		echo $form->Textarea($model,'textolargo',array('rows'=>3, 'columns'=>150) ) ;


		?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>



</div>

	

	<?php if ( !$model->isNewRecord )  {
		//VAR_DUMP($this->action->id);YII::APP()->END();
				  if($this->action->id=='ver')
				  {
					  $proveedor=Alkardex::model()->search_por_vale($model->id);
				  }
		           else{
					   $proveedor=Tempalkardex::model()->search_por_vale($model->id);
				   }

				$this->renderpartial('n_vw_detalle_vale',
					    array('campoestado'=>'cestadovale',
							'model'=>$model,
							'eseditable'=>$this->eseditable($model->cestadovale),
							'proveedor'=>$proveedor,
						         ),false
				                     );
				  
				}
     ?>



	<?php $this->endWidget(); ?>
</div>

</div>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Crear item',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
<iframe id="cru-frame3" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
