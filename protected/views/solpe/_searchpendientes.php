<?php
/* @var $this SolpeController */
/* @var $model Solpe */
/* @var $form CActiveForm */
?>
<div class="division">
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
	<DIV class="panelizquierdo">


	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>10,'maxlength'=>10)); ?>
	</div>
		<div class="row">
			<?php echo $form->label($model,'txtmaterial'); ?>
			<?php echo $form->textField($model,'txtmaterial',array('size'=>40,'maxlength'=>40)); ?>
		</div>



	<div class="row">
    <?php  
		/*$documento='350';
		$criteria = new CDbCriteria;
		$criteria->condition='codocu=:docu';
		$criteria->params=array(':docu'=>$documento);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
	 echo $form->label($model,'codestado'); 
		 $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
		 				 echo $form->DropDownList($model,'est',$datos, array('empty'=>'--Indique el status del detalle--')  )  ;

			*/	?>
	</div>
	    <div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php
				$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'codart',												
												'ordencampo'=>1,
												'controlador'=>'VwReservasPendientes',
												'relaciones'=>$model->relations(),
												'tamano'=>8,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdfj',
													)
													
								);

						
			   ?>
	</div>

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'centro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'centro',$datos1, array('empty'=>'--Seleccione una referencia--',  
													    ) ) ;
		?>
		<?php echo $form->error($model,'centro'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, )); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>

	</div> <!--Fin del div panmel izquierdo !-->
	<div class="panelderecho">

	    <div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
			$this->widget('ext.matchcode.MatchCode',array(		
												'nombrecampo'=>'imputacion',												
												'ordencampo'=>1,
												'controlador'=>'VwSolpe',
												'relaciones'=>$model->relations(),
												'tamano'=>10,
												'model'=>$model,
												'form'=>$form,
												'nombredialogo'=>'cru-dialog3',
												'nombreframe'=>'cru-frame3',
												'nombrearea'=>'fehdeeefj',
													)
													
								);
									
			   ?>
	</div>

			<div class="row">

						<?php echo $form->labelEx($model,'fechaent'); ?>
 								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 										array(
												 'model'=>$model,
 												'attribute'=>'fechaent',
												 'value'=>$model->fechaent,
 												'language' => 'es',
												 'htmlOptions' => array('readonly'=>"readonly"),
												 'options'=>array(
 												'autoSize'=>true,
 												'defaultDate'=>$model->fechaent,
													 'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													 'showOn'=>'both', // 'focus', 'button', 'both'
													 'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
													 'buttonImageOnly'=>true,
													 'dateFormat'=>'yy-mm-dd',
												 'selectOtherMonths'=>true,
 													'showAnim'=>'slide',
 													'showButtonPanel'=>false,
													 'showOtherMonths'=>true,
													 'changeMonth' => 'true',
 													'changeYear' => 'true',
													 ),
 														)
							);?>
          </div>
		<div class="row">
							<?php echo $form->labelEx($model,'fechaent1'); ?>
											<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 														array(
 													'model'=>$model,
 													'attribute'=>'fechaent1',
 													'value'=>$model->fechaent1,
													 'language' => 'es',
 														'htmlOptions' => array('readonly'=>"readonly"),
															'options'=>array(
																'autoSize'=>true,
																'defaultDate'=>$model->fechaent,
																'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
																'showOn'=>'both', // 'focus', 'button', 'both'
																'buttonImage'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'calendar_1.png',
																'buttonImageOnly'=>true,
																'dateFormat'=>'yy-mm-dd',
																'selectOtherMonths'=>true,
																'showAnim'=>'slide',
																'showButtonPanel'=>false,
																'showOtherMonths'=>true,
																'changeMonth' => 'true',
																'changeYear' => 'true',
															),
 																		)
											);?>
				    </div>





	<div class="row">
		<?php echo $form->labelEx($model,'usuario_reserva'); ?>
		<?php echo $form->textField($model,'usuario_reserva',array('size'=>10,'maxlength'=>10, )); ?>
		
	</div>
	



<?php $this->endWidget(); ?>


	</div> 	 <!-- fin del div panel derecho -->

</div><!-- search-form -->

</div><!--divisaio -->


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



	