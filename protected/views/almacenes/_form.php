<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacenes-form',
'enableClientValidation'=>false,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
         'validateOnChange'=>true
     ),

)); ?>

<?php
$habilitado='';
//var_dump($model->nitems);die();
if((integer)$model->nitems > 0 )
	$habilitado='disabled';
?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codalm'); ?>
		<?php echo $form->textField($model,'codalm',array('size'=>3,'maxlength'=>3,'disabled'=>(!$model->isNewRecord)?'disabled':'')); ?>
		<?php echo $form->error($model,'codalm'); ?>
	</div>
	<?php $this->widget('ext.AskToSaveWork', array('watchElement'=>'#Product_name','message'=>Yii::t('messages', "You haven't save your product yet!")))?>
	<div id="Product_name">

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomal'); ?>
		<?php echo $form->textField($model,'nomal',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'nomal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desalm'); ?>
		<?php echo $form->textArea($model,'desalm',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desalm'); ?>
	</div>

	

	 <div class="row">
	  
		
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php
		     $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
		echo $form->DropDownList($model,'codcen',$datos, array('empty'=>'--Llene el centro emisor--','disabled'=>$habilitado));

		?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'tipovaloracion'); ?>
		<?php echo $form->textField($model,'tipovaloracion',array('size'=>2,'maxlength'=>2,
									'ajax'=>array(
										'type'=>'POST', 
										'url'=>$this->createUrl('/almacenes/creade'),
										'replace'=>'#Almacenes_codsoc',

										),


		)); ?>



		<?php echo $form->error($model,'tipovaloracion'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codsoc'); ?>
		<?php echo $form->textField($model,'codsoc',array('size'=>1,'maxlength'=>1,'disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codsoc'); ?>
	</div>




	<div class="row">
		<?php echo $form->labelEx($model,'fecharefpronostico'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	//'name'=>'my_date',
	'model'=>$model,
	'attribute'=>'fecharefpronostico',
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
	));?>


		<?php echo $form->error($model,'fecharefpronostico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tolstockres'); ?>
		<?php echo $form->textField($model,'tolstockres');?>
		<?php echo $form->error($model,'tolstockres'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'estructura'); ?>
		<?php echo $form->textField($model,'estructura',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'estructura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agregarauto'); ?>
		<?php echo $form->checkBox($model,'agregarauto'); ?>

	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'verprecios'); ?>
		<?php echo $form->checkBox($model,'verprecios'); ?>
		<?php echo $form->error($model,'verprecios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bloqueado'); ?>
		<?php echo $form->checkBox($model,'bloqueado',ARRAY('disabled'=>'disabled')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codmon'); ?>
		<?php $datos=CHTml::listdata(Monedas::model()->FindAll("habilitado='1'",array("order"=>"desmon ASC")),'codmoneda','desmon'); ?>
		<?php echo $form->DropdownList($model,'codmon',$datos,array('empty'=>'--Seleccione moneda--','disabled'=>$habilitado)); ?>
		<?php echo $form->error($model,'codmon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'novalorado'); ?>
		<?php echo $form->checkBox($model,'novalorado',array('disabled'=>$habilitado)); ?>

	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar',array("class"=>"botoncito")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
<?php
$this->renderPartial('movimientos',array('model'=>$model));
?>
