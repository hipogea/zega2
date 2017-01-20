<?php
/* @var $this CuentasController */
/* @var $model Cuentas */
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

	<div class="row">
		<?php echo $form->label($model,'codcuenta'); ?>
		<?php echo $form->textField($model,'codcuenta',array('size'=>18,'maxlength'=>18)); ?>
	</div>
    
     <div class="row">
	<?php echo $form->label($model,'clase'); ?>
	<?php  
        //$datos = array('1' => 'Pedido Abierto ','0'=> 'Pedido normal');
        //var_dump(Cuentas::clases());
	$datos  = CHtml::listData(Cuentas::clases(),'clase','descriclase');

	echo $form->DropDownList($model,'clase',$datos, array('empty'=>'--Indique la clase--')  )  ;	?>
	</div> 
    
    <div class="row">
	<?php echo $form->label($model,'elemento'); ?>
	<?php  
        //$datos = array('1' => 'Pedido Abierto ','0'=> 'Pedido normal');
        //var_dump(Cuentas::clases());
	$datossd  = CHtml::listData(Cuentaselemento::model()->findAll(),'id','descrilarga');

	echo $form->DropDownList($model,'elemento',$datossd, array('empty'=>'--Indique elemento--')  )  ;	?>
	</div> 
    
    
    
     <div class="row">
	<?php echo $form->label($model,'registro'); ?>
	<?php  
          $datosx = array('1' => 'Cuenta de Registro ','0'=> 'No es cuenta de registro');
        //var_dump(Cuentas::clases());
	//$datos  = CHtml::listData(Cuentas::clases(),'clase','descriclase');

	echo $form->DropDownList($model,'registro',$datosx, array('empty'=>'--Indique el tipo--')  )  ;	?>
	</div> 
    

	<div class="row">
		<?php echo $form->label($model,'descuenta'); ?>
		<?php echo $form->textField($model,'descuenta',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	

	<div class="row">
		<?php echo $form->label($model,'contrapartida'); ?>
		<?php echo $form->textField($model,'contrapartida',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n2'); ?>
		<?php echo $form->textField($model,'n2',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n3'); ?>
		<?php echo $form->textField($model,'n3',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	

	

<?php $this->endWidget(); ?>

</div><!-- search-form -->