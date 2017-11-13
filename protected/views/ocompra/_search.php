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


	<div class='division_1'>
				<div style="float: left; ">
			        <?php echo $form->labelEx($model,'codentro'); ?>
					<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codentro',$datos, array('empty'=>'--Seleccione un centro --')  );
					?>
				</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codigoalma'); ?>
			<?php  $datos6 = CHtml::listData(Almacenes::model()->findAll(),'codalm','nomal');
			echo $form->DropDownList($model,'codigoalma',$datos6, array('empty'=>'--Seleccione un almacen --')  );
			?>
		</div>



				<div class="row">
					<?php // echo $form->label($model,'c_serie'); ?>
					<?php //echo $form->textField($model,'c_serie',array('size'=>4,'maxlength'=>4)); ?>
				</div>

	
				<div class="row">
					<?php echo $form->label($model,'numcot'); ?>
					<?php echo $form->textField($model,'numcot',array('size'=>12,'maxlength'=>12)); ?>
				</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codpro'); ?>
			<?php
			$this->widget('ext.matchcode1.Seleccionavarios',array(
					'nombrecampo'=>'codpro',
					//'ordencampo'=>1,
					'controlador'=>'VwOcomprasimple',
					'relaciones'=>$model->relations(),
					'tamano'=>8,
					'model'=>$model,
					'nombremodelo'=>'Clipro',
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					//'nombrearea'=>'fehdfj',
				)

			);


			?>
		</div>

		</div>

		<div class='division_2'>
			<div class="row">
				<?php echo $form->labelEx($model,'codart'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'codart',
						//'ordencampo'=>1,
						'controlador'=>'VwOcomprasimple',
						'relaciones'=>$model->relations(),
						'tamano'=>10,
							'model'=>$model,
						'nombremodelo'=>'Maestrocompo',
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						//'nombrearea'=>'fehdfj',
					)

				);


				?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'numsolpe'); ?>
				<?php
				$this->widget('ext.matchcode1.Seleccionavarios',array(
						'nombrecampo'=>'numsolpe',
						//'ordencampo'=>1,
						'controlador'=>'VwOcomprasimple',
						'relaciones'=>$model->relations(),
						'tamano'=>8,
						'model'=>$model,
						'nombremodelo'=>'VwSolpe',
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						//'nombrearea'=>'fehdfj',
					)

				);


				?>
			</div>


			<div class="row">
						<?php echo $form->label($model,'rucpro'); ?>
						<?php echo $form->textField($model,'rucpro',array('size'=>14,'maxlength'=>14)); ?>
					</div>
	
	
					<div class="row">
						<?php echo $form->labelEx($model,'fecdoc'); ?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array(
								'model'=>$model,
								'attribute'=>'fecdoc',
								'value'=>$model->fecdoc,
								'language' => 'es',
								'htmlOptions' => array('readonly'=>"readonly"),
								'options'=>array(
									'autoSize'=>true,
									'defaultDate'=>$model->fecdoc,
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
							<?php echo $form->labelEx($model,'fecdoc1'); ?>

							<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
								array(
									'model'=>$model,
									'attribute'=>'fecdoc1',
									'value'=>$model->fecdoc1,
									'language' => 'es',
									'htmlOptions' => array('readonly'=>"readonly"),
									'options'=>array(
										'autoSize'=>true,
										'defaultDate'=>$model->fecdoc1,
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

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>700,
              'position'=>array("my"=>"top","at"=>"center","of"=>"window"),
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%" style="overflow-y:hidden;overflow-x:hidden;"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

