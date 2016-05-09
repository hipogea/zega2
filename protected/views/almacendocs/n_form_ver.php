<?php MiFactoria::titulo("Visualizar Documento de Almacen :".$model->numvale."  (  ".yii::app()->user->um->loadUserById($model->iduser)->username."  )",'package');?>
<div class="division">
<div class="wide form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'almacendocs-form',
		//'action'=>Yii::app()->createUrl('/Almacendocs/'.$movimiento),
		'enableAjaxValidation'=>false,
	)); ?>
	<?php echo $form->errorSummary($model); ?>
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
				'visiblex'=>array(ESTADO_CREADO),
			),



			'print'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/imprimir',array('id'=>$model->id)),
				'visiblex'=>array((yii::app()->user->checkAccess('almacendocs_imprimir'))?ESTADO_EFECTUADO:'xx'),
			),

			'edit'=>array(
				'type'=>'B',
				'ruta'=>array($this->id.'/editar',array('id'=>$model->id)),
				'visiblex'=>array(ESTADO_EFECTUADO),
			),

			'add'=>array(
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
			<?php
			echo $form->textfield($model,'fechavale',array('disabled'=>'disabled'));
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codmovimiento'); ?>
			<?php echo Chtml::textField($model->almacenmovimientos->movimiento,$model->almacenmovimientos->movimiento,array('disabled'=>'disabled','size'=>30)); ?>
			<?php $form->hiddenField($model,'codmovimiento'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codalmacen'); ?>
			<?php
			echo $form->textField($model,'codalmacen',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codcentro'); ?>
			<?php
			echo $form->textField($model,'codcentro',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>

			<?php echo $form->error($model,'codcentro'); ?>
		</div>





		<div class="row">
			<?php echo $form->labelEx($model,'codtrabajador'); ?>
			<?php
			 echo Chtml::textField($model->trabajadores->ap,$model->trabajadores->ap,array('disabled'=>'disabled','size'=>30));

			?>

		</div>



		<div id="zonadespacho"></div>
	</div>




	<div class="panelderecho">


		<div class="row">
			<?php echo $form->labelEx($model,'codestadovale'); ?>
			<?php
			echo CHtml::textField('hola',
				$model->almacendocs_estado->estado,
				array('disabled'=>'disabled','size'=>20));
			?>

		</div>





		<div class="row">
			<?php echo $form->labelEx($model,'fechacont'); ?>
			<?php echo $form->textField($model,'fechacont',array('disabled'=>'disabled','size'=>15)); ?>


		</div>

		<div class="row">

			<?php echo $form->labelEx($model,'fechacre'); ?>
			<?php echo $form->textField($model,'fechacre',array('disabled'=>'disabled','size'=>15)); ?>

		</div>




		<div class="row">
			<?php	echo $form->labelEx($model,'numdocref'); ?>
			<?php echo $form->textField($model,'numdocref',array('disabled'=>'disabled')); ?>
		</div>


		<div class="row">
			<?php echo $form->labelEx($model,'codaldestino'); ?>
			<?php
			echo $form->textField($model,'codaldestino',array('size'=>3,'maxlength'=>3,'disabled'=>($model->isNewRecord)?'':'disabled')); ?>
			<?php echo $form->error($model,'codaldestino'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codcendestino'); ?>
			<?php
			echo $form->textField($model,'codcendestino',array('size'=>4,'disabled'=>'disabled'));
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'codocuref'); ?>
			<?php echo Chtml::textField('SORA',$model->docureferencia->desdocu,array('disabled'=>'disabled','size'=>30)); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'textolargo'); ?>
			<?php
			echo $form->Textarea($model,'textolargo',array('rows'=>3, 'columns'=>150,'disabled'=>($model->isNewRecord)?'':'disabled') ) ;
			?>
			<?php echo $form->error($model,'textolargo'); ?>
		</div>



	</div>


	<?php
	$this->renderpartial('n_detalle_vale_ver',
		array('campoestado'=>'cestadovale',
			'model'=>$model,
			'eseditable'=>$this->eseditable($model->cestadovale)
		),false
	);


	?>



	<?php $this->endWidget(); ?>
</div>

</div>