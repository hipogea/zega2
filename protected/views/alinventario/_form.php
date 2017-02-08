<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */
/* @var $form CActiveForm */
?>






	<?php echo $form->errorSummary($model); ?>

	<div style="overflow:auto">
	<div class="division">

	  <div style="width:300px;height:210px, padding:15px; margin:5px; float:left;">



		  <div class="division">

		<?php
		$modelodatos=Maestrodetalle::model()->findByPk(array('codart'=>$model->codart,
													'codcentro'=>$model->codcen,
			'codal'=>$model->codalm,

			));
		if(!is_null($modelodatos) )
			  if($modelodatos->supervisionautomatica=='1') {
            $maximovalor=round(1.5*$modelodatos->canteconomica,0); //(30% exceso de la cantidad economica)
				 $this->widget('ext.semaforo.Semaforo',
					  array(
						  'valores'=>ARRAY($modelodatos->cantreposic,$modelodatos->cantreorden,$modelodatos->canteconomica),
						  'asc'=>1,
						  'valor'=>$model->cantlibre ,

					  )
				  );

		$this->widget('ext.kpi.Kpi',array(

		'startAngle'=>-150,
		'endAngle'=>150,
		'min'=>0,
		'max'=>($model->cantlibre > $maximovalor)?$model->cantlibre+0:$maximovalor+0,
		'step'=>($maximovalor)/40,
		'texto'=>'Libre',
		'ancholinea'=>1,
		'titulo'=>'Stock',
		'rangocolores'=>array(
			array('from'=>0,'to'=>$modelodatos->cantreposic+0,'color'=>'#DF5353'),
			array('from'=>$modelodatos->cantreposic+0,'to'=>$modelodatos->cantreorden+0,'color'=>'#FFBF00'),
			array('from'=>$modelodatos->cantreorden+0,'to'=>$modelodatos->canteconomica+0,'color'=>'#55BF3B'),
			array('from'=>$modelodatos->canteconomica+0,'to'=>2.5*$modelodatos->canteconomica+0,'color'=>'#DF5353'),
		),
		'valor'=>$model->cantlibre+0,
		'sufix'=>'  Unidades ',
	) );
			   } else  {

				  echo "Este material no tiene supervision de Stocks,puede habilitar esta opcion   ";
				  echo CHTml::link("  Aquí  ",yii::app()->createUrl("maestrocompo/editarmaterial/".$model->codart),array('target'=>'_blank'));
			  }

          ?>
          <?PHP  MiFactoria::titulo('Rotacion  : ','arrow_refresh');?>
			  <div style="display:block; width:160px;padding:5px; margin:5px; float:left;">

                   <div >

					  <?php echo $form->labelEx($model,'fechaini'); ?>
					  <?php

					  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						  //'name'=>'my_date',
						  'model'=>$model,
						  'attribute'=>'fechaini',
						  'language'=>Yii::app()->language=='es' ? 'es' : null,
						  'options'=>array(
							  'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
							  'showOn'=>'button', // 'focus', 'button', 'both'
							  'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
							  'buttonImageOnly'=>true,
							  'dateFormat'=>'yy-mm-dd',
						  ),
						  'htmlOptions'=>array(
							  'style'=>'width:100px;vertical-align:top',
							  'readonly'=>'readonly',
						  ),
					  ));



					  ?>
					  <?php echo $form->error($model,'fechaini'); ?>
				  </div>
				    <div >
					  <?php echo $form->labelEx($model,'fechafin'); ?>
					  <?php

					  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
						  //'name'=>'my_date',
						  'model'=>$model,
						  'attribute'=>'fechafin',
						  'language'=>Yii::app()->language=='es' ? 'es' : null,
						  'options'=>array(
							  'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
							  'showOn'=>'button', // 'focus', 'button', 'both'
							  'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
							  'buttonImageOnly'=>true,
							  'dateFormat'=>'yy-mm-dd',
						  ),
						  'htmlOptions'=>array(
							  'style'=>'width:100px;vertical-align:top',
							  'readonly'=>'readonly',
						  ),
					  ));



					  ?>
					  <?php echo $form->error($model,'fechafin'); ?>


				  </div>


			  </div>

			  <div style="display:block; width:50px;padding:5px; margin:5px; float:right;" >
				  <?php  echo Chtml::ajaxLink(
					  Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."package.png"),
					  CController::createUrl($this->id.'/pintarotacion'), array(
					  'type' => 'GET',
					  'url' => CController::createUrl($this->id.'/pintarotacion'), //  la acci?n que va a cargar el segundo div
					  "data"=>array(
						  "id"=>$model->id,
						  "fechaini"=>"js:Alinventario_fechaini.value",
						  "fechafin"=>"js:Alinventario_fechafin.value",
					  ),
					  "update" => "#zonarotacion",
				  ),
					  array('onClick'=>'Loading.show();Loading.hide(); return false;')
				  );?>

				  <br>
				  <div id="zonarotacion">

				  </div>

			  </div>
             <!--  !--->
		  </div>

		</div>







	<div style="width:500px;height:210px, border-style: solid #000 1px;  padding:5px; margin:15px; float:left; ">
		<div class="wide form">
		  <div class="row">
			<?php echo $form->labelEx($model,'codcen'); ?>
			<?php   $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
			echo $form->DropDownList($model,'codcen',$datos, array(  'ajax' => array('type' => 'POST',
				'url' => CController::createUrl('Alinventario/cargaalmacenes1'), //  la acción que va a cargar el segundo div
				'update' => '#Alinventario_codalm' // el div que se va a actualizar
			),
				'empty'=>'--Seleccione un centro--',
				'disabled'=>$model->isNewRecord ?'':'disabled',

			) ) ;
			?>
			<?php echo $form->error($model,'codcen'); ?>
		</div>



<?php echo $form->hiddenField($model,'id'); ?>

		<div>

			<?php echo $form->labelEx($model,'codalm'); ?>
			<?php
			$datos = CHtml::listData(Almacenes::model()->findAll(array('order'=>'nomal')),'codalm','nomal');
			echo $form->DropDownList($model,'codalm',$datos, array('empty'=>'--Llene el centro--','disabled'=>$model->isNewRecord ?'':'disabled',));

			?>
			<?php echo $form->error($model,'codalm'); ?>
		</div>



		<div class="row">
			<?php echo $form->labelEx($model,'periodocontable'); ?>
			<?php echo $form->textField($model,'periodocontable',array('size'=>4,'maxlength'=>4)); ?>
			<?php echo $form->error($model,'periodocontable'); ?>
		</div>





	    <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
	       if( $model->isNewRecord ) {
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codart',
												'ordencampo'=>6,
												'controlador'=>$this->id,
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
											'nombrearea'=>'fhdfj',
													));
													

										 echo $form->error($model,'codart');
						} else {

								echo CHtml::textField('Sax',$model->codart,array('disabled'=>'disabled','size'=>8)) ;
							echo CHtml::textField('Sa',$model->maestro->descripcion,array('disabled'=>'disabled','size'=>40)) ;
						}

			   ?>
	</div>

	

	<div class="row">
		<?php echo Chtml::label('um','um'); ?>
		<?php echo Chtml::textField('ssfsfs',$model->maestro->maestro_ums->desum,array('disabled'=>'disabled', 'size'=>3,'maxlength'=>3)); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantlibre' ); ?>
		<?php echo $form->textField($model,'cantlibre',array('disabled'=>'disabled')); ?>
            En compra: <span class="label badge-important"><?php echo $model->ingresoCompraPendiente();  ?></span>
		<?php echo $form->error($model,'cantlibre'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'canttran'); ?>
		<?php echo $form->textField($model,'canttran',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'canttran'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'cantres'); ?>
		<?php echo $form->textField($model,'cantres',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'cantres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'punit'); ?>
		<?php echo $form->textField($model,'punit',array('disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'punit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pttotal'); ?>
		<?php
		  echo $form->textField($model,'pttotal', array('value'=>round($model->cantlibre*$model->punit,2),'disabled'=>'disabled'  ) ) ;
		?>
	

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>10,'maxlength'=>10)); ?>
		<?php  echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."package.png"),
			CController::createUrl($this->id.'/updateubicacion'), array(
				'type' => 'POST',
				'url' => CController::createUrl($this->id.'/updateubicacion'), //  la acci?n que va a cargar el segundo div
				"data"=>array(
					"codubicacion"=>"js:Alinventario_ubicacion.value",
					"id"=>"js:Alinventario_id.value"
				),
				"update" => "#zonamensajes",
			)

		);?>


	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lote'); ?>
		<?php echo $form->textField($model,'lote',array('disabled'=>'disabled','size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'lote'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'siid'); ?>
		<?php echo $form->textField($model,'siid'); ?>
		<?php echo $form->error($model,'siid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ssiduser'); ?>
		<?php echo $form->textField($model,'ssiduser',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ssiduser'); ?>
	</div>

			<div id="zonamensajes"></div>



  </div><!-- form -->
	</div>
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
        'width'=>400,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>