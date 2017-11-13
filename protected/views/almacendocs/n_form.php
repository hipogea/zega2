<?php
/* @var $this AlmacendocsController */
/* @var $model Almacendocs */
/* @var $form CActiveForm */
?>
<?php MiFactoria::titulo("Documento de Almacen :".$model->numvale."  (  ".yii::app()->user->um->loadUserById($model->iduser)->username."  )",'package');?>

<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacendocs-form',
	//'action'=>Yii::app()->createUrl('/Almacendocs/'.$movimiento),
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<?php // echo "<br><br><br><br>  ".($model->isnewRecord)?"ES NUEVO - EN EL FORM ":"YA NO ES NUVEO EN EL FOMRN";?>

	<div class="row">
		<?php
                
		$botones=array(
			'go'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array(ESTADO_PREVIO,NUll),
			),
			'save'=>array(
				'type'=>'A',
				'ruta'=>array(),
				'visiblex'=>array(ESTADO_CREADO,ESTADO_EFECTUADO),
			),



			'print'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/imprimir',array('id'=>$model->id)),
				'visiblex'=>array(ESTADO_EFECTUADO),
			),
                    
                    'tacho'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/crearvale',array('micodigomov'=>$model->almacenmovimientos->anticodmov,'numerovale'=>$model->numvale)),
				'visiblex'=>array(ESTADO_EFECTUADO,$model->almacenmovimientos->idevento!=71), //71 es el evento de anular vale
			),
                    
			'book'=>array(
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
				'status'=>$model->{$this->campoestado},

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
		<?php if(is_null($model->codmovimiento) or empty($model->codmovimiento)) { ?>
	<?php
			//var_dump(Almacenes::movimientospermitidos($model->codalmacen));die();
		IF(empty($model->codalmacen)){
				$datos1 = CHtml::listData(Almacenmovimientos::model()->findAll(array('order'=>'movimiento','condition'=>"esreal='1'")),'codmov','movimiento');
		}else{
			//var_dump(Almacenes::mismovimientospermitidos($model->codalmacen)[0]);die();
			$datos1 = CHtml::listData(Almacenes::mismovimientospermitidos($model->codalmacen),'codmov','movimiento');
		}



			echo $form->dropDownList($model,'codmovimiento',$datos1,array(
													'prompt'=>'Seleccione un movimiento',
													'onChange'=>'window.location.href="'.Yii::app()->getRequest()->getUrl().'?micodigomov="+this.value;Loading.show();Loading.hide(); ',
													/*'onChange'=>'window.location="'.Yii::app()->getRequest()->getUrl().'"',*/
													/*'ajax' =>
															array('type'=>'POST',
																'url'=>'', //url to call.
																'update'=>'#price', //selector to update
																'data'=>array('mimovimiento'=>'js:this.value'),
																	),*/
																)
							);
	?>

	<?php echo $form->error($model,'codmovimiento'); ?>

		<?php  } else { ?>
			<?php echo Chtml::textField(Almacenmovimientos::model()->findByPk($model->codmovimiento)->movimiento,Almacenmovimientos::model()->findByPk($model->codmovimiento)->movimiento,array('disabled'=>'disabled','size'=>30)); ?>
			<?php $form->hiddenField($model,'codmovimiento'); ?>
		<?php  }  ?>

	</div>



	

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
							echo $form->textField($model,'codcentro',array('size'=>4,'disabled'=>'disabled')); 
		 			 			}
		?>
		<?php echo $form->error($model,'codcentro'); ?>
	</div>


	<?php
	if($model->cestadovale==ESTADO_EFECTUADO AND $model->almacenmovimientos->signo < 0  ) {	?>
	<div class="row">
		<?php echo CHtml::label('Punto expedicion','lblpuntoexped'); ?>
		<?php $datos1 = CHtml::listData ( Puntodespacho::model ()->findAll ( " codcen='" . $model->codcentro . "'" ) , 'id' , 'nombrepunto' );
		echo CHtml::DropDownList ( 'cbopuntoexped' , 'codtcentro' , $datos1 , array ( 'empty' => '--Selecc pto expedicion--' ,
		) );
		?>
		<?php
		echo $form->hiddenField($model,'id');
		?>

		<?php
		echo CHtml::ajaxSubmitButton("Pick",
			array("almacendocs/expedicion"),
			array("type"=>"POST",
				"data"=>array(
					"codiguito"=>"js:cbopuntoexped.value",
					"identidad"=>"js:Almacendocs_id.value",
					"responsable"=>"js:cboresponsable.value",
				),
				"update" => "#zonadespacho",
			),
			array('onClick'=>'Loading.show();Loading.hide(); return false;')
		) ;
		?>
    </div>

	<?php
	if(is_null($model->codtrabajador) or empty($model->codtrabajador) ) {	?>
		<div class="row">
			<?php echo CHtml::label('Responsable','Responsable');  ?>
			<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
			echo CHtml::DropDownList ( 'cboresponsable' , 'responsable' ,$datos, array('empty'=>'--Seleccione un responsable--')  );
			?>
		</div>
	<?php } else {
		echo CHtml::hiddenField('cboresponsable',$model->codtrabajador);
	 } ?>


	<?php }	?>


	<div class="row">
		<?php echo $form->labelEx($model,'codtrabajador'); ?>
		<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
		echo $form->DropDownList ($model, 'codtrabajador' ,$datos, array('empty'=>'--Seleccione un responsable--')  );
		?>
		<?php echo $form->error($model,'codtrabajador'); ?>
	</div>



	<div id="zonadespacho"></div>
</div>




<div class="panelderecho">


	<div class="row">
		<?php 
                if(!$model->isNewRecord)
			 { echo $form->labelEx($model,'codestadovale'); ?>
		
		<?php 
			
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

	<div class="row">
		<?php //echo $form->labelEx($model,'numdocref'); ?>
		<?php //echo $form->textField($model,'numdocref',array('size'=>15,'maxlength'=>15,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php //echo $form->error($model,'numdocref'); ?>
	</div>

	<?php if($model->isNewRecord){ ?>

	<div class="row">
		<?php	echo $form->labelEx($model,'numdocref'); ?>

		<?php $this->widget('ext.matchcodesimple.MatchCodeSimple',array(
			'nombrecampo'=>'numdocref',
			'controlador'=>$this->id,
			'tamano'=>9,
			'model'=>$model,
			'nombreclase'=>$this->eligeclase($model->codmovimiento),
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
		));
		?>

	</div>

	<?php }else {?>
		<div class="row">
			<?php	echo $form->labelEx($model,'numdocref'); ?>
			<?php echo $form->textField($model,'numdocref',array('disabled'=>'disabled')); ?>

		</div>

	<?php } ?>
	<?php echo $form->error($model,'numdocref'); ?>





	<div class="row">
		<?php echo $form->labelEx($model,'codaldestino'); ?>
		<?php
		echo $form->textField($model,'codaldestino',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		<?php echo $form->error($model,'codaldestino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codcendestino'); ?>
		<?php
		if($model->isNewRecord) {
			$datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
			echo $form->DropDownList($model,'codcendestino',$datos1, array('empty'=>'--Seleccione un centro--',
			) ) ;
		} else {
			echo $form->textField($model,'codcendestino',array('size'=>4,'disabled'=>'disabled'));
		}
		?>
		<?php echo $form->error($model,'codcendestino'); ?>
	</div>

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

	



</div>
<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php

		echo $form->Textarea($model,'textolargo',array('rows'=>3, 'columns'=>300,'disabled'=>($model->isNewRecord)?'':'disabled') ) ;


		?>
		<?php echo $form->error($model,'textolargo'); ?>
	</div>
	

	<?php if ( !$model->isNewRecord )  {
				  
				$this->renderpartial('n_vw_detalle_vale',
					    array('campoestado'=>'cestadovale',
							'model'=>$model,
							'eseditable'=>$this->eseditable($model->cestadovale)
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
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();

//--------------------- end new code --------------------------
?>