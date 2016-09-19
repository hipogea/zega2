<?php
/* @var $this ListamaterialesController */
/* @var $model Listamateriales */
/* @var $form CActiveForm */
?>
<div class="division">
	<div class="wide form">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'listamateriales-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codtipo'); ?>
		<?php

                        $datos = CHtml::listData(Tipolista::model()->findAll(array('order'=>'destipo')),'codtipo','destipo');
    echo $form->DropDownList($model,'codtipo',$datos, array('empty'=>'--Llene el tipo--'));


		?>
		<?php echo $form->error($model,'codtipo'); ?>

	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'nombrelista'); ?>
		<?php echo $form->textField($model,'nombrelista',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombrelista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>

	<div class="row">
		<?PHP IF(!$model->isnewRecord){ ?>
		<?php echo $form->labelEx($model,'iduser'); ?>
		<?php echo CHtml::textField('suuaio',strtoupper(Yii::app()->user->um->loadUserById($model->iduser,false)->username),array('disabled'=>'disabled')); ?>
	<?PHP } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compartida'); ?>
		<?php echo $form->checkBox($model,'compartida'); ?>
		<?php echo $form->error($model,'compartida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
	</div>
</div>
<?php
if(!$model->isNewRecord) {
	?>

	<?PHP
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'detalle-grid',
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>Dlistamaeriales::model()->search_por_lista($model->id),
		//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
		'summaryText'=>'->',
		'columns'=>array(
			'codigo',
			'cant',
			'um',
			'ums.desum',
			'maestro.descripcion',

			array(
				'htmlOptions'=>array('width'=>400),
				'class'=>'CButtonColumn',
				'template'=>'{delete}',
				'buttons'=>array(



					'delete'=>

						array(
							'visible'=>'true',
							'url'=>'$this->grid->controller->createUrl("/listamateriales/ajaxborramaterial", array("id"=>$data->id))',
							'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}' ,'url'=>'js:$(this).attr("href")'),
								'onClick'=>'Loading.show();Loading.hide(); ',
							) ,
							'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
							'label'=>'Ver detalle',
						),
				),
			),
		),
	)); ?>



	<?php
	$createUrl = $this->createUrl ( '/listamateriales/agregamaterial' ,
		array (
			//"id"=>$model->n_direc,
			"asDialog" => 1 ,
			"gridId" => 'detalle-grid' ,
			"idcabeza" => $model->id ,
		)
	);
	echo CHtml::link ( 'Agregar ' , '#' , array ( 'onclick' => "$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');" ) );
	?>

<?php
}
?>




<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog',
	'options'=>array(
		'title'=>'Material a Incorporar',
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