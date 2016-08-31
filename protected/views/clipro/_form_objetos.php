<?php
/* @var $this ObjetosClienteController */
/* @var $model ObjetosCliente */
/* @var $form CActiveForm */
?>

	<div class="form">
		<div class="division">
			<div class="wide form">

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'detgui-form',
					'enableClientValidation'=>TRUE,
					'clientOptions' => array(
						'validateOnSubmit'=>TRUE,
						'validateOnChange'=>TRUE  ,
					),
					'enableAjaxValidation'=>FALSE,




				)); ?>


				<?php echo $form->errorSummary($model); ?>

				<div class="row">
					<?php echo $form->labelEx($model,'codpro'); ?>
					<?php  if($model->isNewRecord){?>
						<?php $this->widget('ext.matchcode.MatchCode',array(
							'nombrecampo'=>'codpro',
							'ordencampo'=>1,
							'controlador'=>get_class($model),
							'relaciones'=>$model->relations(),
							'tamano'=>8,
							'model'=>$model,
							'form'=>$form,
							'nombredialogo'=>'cru-dialog3',
							'nombreframe'=>'cru-frame3',
							'nombrearea'=>'f677hdfssesj',
						));
						?>
					<?php  } else { ?>
						<?php echo $form->textField($model,'codpro',array('disabled'=>'disabled','size'=>6,'maxlength'=>6)); ?>
						<?php echo CHtml::textField('re744g4',$model->clipro->despro,array('disabled'=>'disabled','size'=>46,'maxlength'=>46)); ?>
					<?php  }  ?>

					<?php echo $form->error($model,'codpro'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'codobjeto'); ?>
					<?php echo $form->textField($model,'codobjeto',array('disabled'=>'disabled','size'=>3,'maxlength'=>3)); ?>
					<?php echo $form->error($model,'codobjeto'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'nombreobjeto'); ?>
					<?php echo $form->textField($model,'nombreobjeto',array('size'=>40,'maxlength'=>40)); ?>
					<?php echo $form->error($model,'nombreobjeto'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'descripcionobjeto'); ?>
					<?php echo $form->textArea($model,'descripcionobjeto',array('rows'=>3, 'cols'=>50)); ?>
					<?php echo $form->error($model,'descripcionobjeto'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model,'cebe'); ?>
					<?php $this->widget('ext.matchcode.MatchCode',array(
						'nombrecampo'=>'cebe',
						'ordencampo'=>1,
						'controlador'=>get_class($model),
						'relaciones'=>$model->relations(),
						'tamano'=>12,
						'model'=>$model,
						'form'=>$form,
						'nombredialogo'=>'cru-dialog3',
						'nombreframe'=>'cru-frame3',
						'nombrearea'=>'rtrttr4',
					));
					?>
					<?php echo $form->error($model,'cebe'); ?>
				</div>

				<div class="row buttons">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
				</div>

				<?php $this->endWidget(); ?>

			</div><!-- form -->

		</div>






		<?php  if(!$model->isNewRecord){?>


			<?PHP
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'detalle-grid',
				'itemsCssClass'=>'table table-striped table-bordered table-hover',
				'dataProvider'=>Objetosmaster::model()->search_por_objeto($model->id),
				//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
				'summaryText'=>'->',
				'columns'=>array(
					'id',

					//'masterequipo.codigo',
					'serie',
					'identificador',
					'masterequipo.descripcion',
					'masterequipo.marca',
					'masterequipo.modelo',
					/*'masterequipo.numeroparte',
					'masterequipo.codigopadre',*/

					array(
						'htmlOptions'=>array('width'=>55),
						'class'=>'CButtonColumn',
						'template'=>'{delete}',
						'buttons'=>array(



							'delete'=>

								array(
									'visible'=>'true',
									'url'=>'$this->grid->controller->createUrl("/ObjetosCliente/ajaxborraequipo", array("id"=>$data->id))',
									'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}' ,'url'=>'js:$(this).attr("href")'),

									) ,
									'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
									'label'=>'Borrar Equipo',
								),
						),
					),
				),
			)); ?>








			<?php
			$createUrl = $this->createUrl ( '/ObjetosCliente/agregarequipo' ,
				array (
					//"id"=>$model->n_direc,
					"asDialog" => 1 ,
					"gridId" => 'detalle-grid' ,
					"idcabeza" => $model->id ,
				)
			);
			echo CHtml::link ( 'Agregar ' , '#' , array ( 'onclick' => "$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');" ) );
			?>
		<?php   } ?>


	</div>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog',
	'options'=>array(
		'title'=>'Objeto a Incorporar',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>400,
	),
));
?>
	<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Material a Incorporar',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>500,
		'height'=>400,
	),
));
?>
	<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>
