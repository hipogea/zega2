
<div class="division">
<div class="wide form">
 <?php
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
  ?>
		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
			'clientOptions' => array(
				'validateOnSubmit'=>true,
				'validateOnChange'=>true
			),
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidvale',array('value'=>$idcabeza)):''; ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'codart');
		    echo CHtml::textField('ad',$model->codart,array('disabled'=>'disabled','size'=>10)) ;
			echo CHtml::textField('a',$model->maestro->descripcion,array('disabled'=>'disabled','size'=>40)) ;

		?>

	</div>
 
	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>8,'maxlength'=>8, 'disabled'=>'disabled'   )); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>
<div class="row">
		<?php echo $form->labelEx($model,'preciounit'); ?>
		<?php echo $form->textField($model,'preciounit',array('size'=>8,'maxlength'=>8, 'disabled'=>'disabled' )); ?>
		<?php
		echo (!$model->isNewRecord)?$moneda=$model->alkardex_alinventario->almacen->codmon:
		Almacendocs::model()->findByPk($idcabeza)->almacenes->codmon;
		?>
		<?php echo $form->error($model,'preciounit'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>
	<?php echo CHtml::textField('xxxa',$model->unidades->desum,array('disabled'=>'disabled','size'=>8)) ;  ?>



</div>


	<div class="row">
		<?php echo $form->labelEx($model,'colector'); ?>
		<?php echo $form->textField($model,'colector',array('size'=>18,'maxlength'=>18, 'disabled'=>'disabled')); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'textolargo'); ?>
		<?php echo $form->textArea($model,'textolargo',array('columns'=>4,'rows'=>6,  'disabled'=>'disabled'  )); ?>

	</div>

	<?php
	if($model->alkardex_almacendocs->cestadovale==ESTADO_EFECTUADO AND $model->alkardex_almacendocs->almacenmovimientos->signo < 0  ) {	?>
		<div class="row">
			<?php echo CHtml::label('Punto expedicion','lblpuntoexped'); ?>
			<?php $datos1 = CHtml::listData ( Puntodespacho::model ()->findAll ( " codcen='" . $model->codcentro . "'" ) , 'id' , 'nombrepunto' );
			echo CHtml::DropDownList ( 'cbopuntoexped' , 'codtcentro' , $datos1 , array ( 'empty' => '--Selecc pto expedicion--' ,
			) );
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
				), array('onClick'=>'Loading.show();Loading.hide(); return false;')
			) ;
			?>
		</div>

		<?php
		if(is_null($model->alkardex_almacendocs->codtrabajador) or empty($model->alkardex_almacendocs->codtrabajador) ) {	?>
			<div class="row">
				<?php echo CHtml::label('Responsable','Responsable');  ?>
				<?php  $datos = CHtml::listData(VwTrabajadores::model()->findAll(array('order'=>'ap')),'codigotra','nombrecompleto');
				echo CHtml::DropDownList ( 'cboresponsable' , 'responsable' ,$datos, array('empty'=>'--Seleccione un responsable--')  );
				?>
			</div>
		<?php } else {
			//echo CHtml::hiddenField('cboresponsable',$model->codtrabajador);
		} ?>


	<?php }	?>






<?php $this->endWidget(); ?>

</div>


</div>

