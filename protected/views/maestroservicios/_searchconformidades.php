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
		<?php echo $form->label($model,'numcot'); ?>
		<?php echo $form->textField($model,'numcot',array('size'=>12,'maxlength'=>12)); ?>
	</div>
		<div class="row">
			<?php echo $form->label($model,'descri'); ?>
			<?php echo $form->textField($model,'descri',array('size'=>40,'maxlength'=>40)); ?>
		</div>

		<div class="row">
			<?php echo $form->label($model,'despro'); ?>
			<?php echo $form->textField($model,'despro',array('size'=>40,'maxlength'=>40)); ?>
		</div>
		<div class="row">
			<?php echo $form->label($model,'rucpro'); ?>
			<?php echo $form->textField($model,'rucpro',array('size'=>11,'maxlength'=>11)); ?>
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

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'codcentro'); ?>
		<?php  $datos1 = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		  echo $form->DropDownList($model,'codcentro',$datos1, array('empty'=>'--Seleccione una centro--',
													    ) ) ;
		?>

	</div>
	</div>

	</div> <!--Fin del div panmel izquierdo !-->
	<div class="panelderecho">


			<div class="row">

						<?php echo $form->labelEx($model,'fechacont'); ?>
 								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 										array(
												 'model'=>$model,
 												'attribute'=>'fechacont',
												 'value'=>$model->fechacont,
 												'language' => 'es',
												 'htmlOptions' => array('readonly'=>"readonly"),
												 'options'=>array(
 												'autoSize'=>true,
 												'defaultDate'=>$model->fechacont,
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
							<?php echo $form->labelEx($model,'fechacont1'); ?>
											<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 														array(
 													'model'=>$model,
 													'attribute'=>'fechacont1',
 													'value'=>$model->fechacont1,
													 'language' => 'es',
 														'htmlOptions' => array('readonly'=>"readonly"),
															'options'=>array(
																'autoSize'=>true,
																'defaultDate'=>$model->fechacont1,
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
						<?php echo $form->labelEx($model,'fechaoc'); ?>
		
						<?php //echo $form->labelEx($model,'fecha_nac_ciudadano');  //En este caso fecha_nac_ciudadano es nuestro campo fecha ?>
 								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 										array(
												 'model'=>$model,
 												'attribute'=>'fechaoc',
												 'value'=>$model->fechaoc,
 												'language' => 'es',
												 'htmlOptions' => array('readonly'=>"readonly"),
											'options'=>array(
												'autoSize'=>true,
												'defaultDate'=>$model->fechaoc,
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
							<?php echo $form->labelEx($model,'fechaoc1'); ?>
		
		
											<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
 														array(
 													'model'=>$model,
 													'attribute'=>'fechaoc1',
 													'value'=>$model->fechaoc1,
													 'language' => 'es',
 														'htmlOptions' => array('readonly'=>"readonly"),
															'options'=>array(
																'autoSize'=>true,
																'defaultDate'=>$model->fechaoc1,
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



	