

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>1)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idparent'); ?>
		<?php
		$criteria=New CDbcriteria();
		$criteria->addcondition("hidpeticion=:vpet");
		$criteria->addcondition("tipo=:vtipo");
		$criteria->params=array(":vpet"=>$model->hidpeticion,":vtipo"=>'S');
		$datos = CHtml::listData(Tempdpeticion::model()->findAll($criteria),'item','descripcion');
		echo $form->DropDownList($model,'idparent',$datos, array('empty'=>'--Seleccione la tarea padre--')  )  ;
		?>
		<?php echo $form->error($model,'idparent'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant'); ?>
		<?php echo $form->error($model,'cant'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'codart'); ?>
		<?php $this->widget('ext.matchcode1.MatchCode1',array(
			'nombrecampo'=>'codart',
			//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
			'ordencampo'=>6,
			'controlador'=>'Tempdpeticion',
			'relaciones'=>$model->relations(),
			'tamano'=>8,
			'habilitado'=>true,
			'model'=>$model,
			'form'=>$form,
			'nombredialogo'=>'cru-dialog3',
			'nombreframe'=>'cru-frame3',
			'nombrearea'=>'miffuufu',
			'nombrecampoareemplazar'=>'descripcion',
			//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
		));
		?>

		<?php echo $form->error($model,'codart'); ?>
		<?php echo $form->error($model,'codart'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'um'); ?>


		<?php  echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl('Ums/cargaum'), array(
				'type' => 'POST',
				'url' => CController::createUrl('Ums/cargaum'), //  la acci?n que va a cargar el segundo div
				'update' => '#Tempdpeticion_um', // el div que se va a actualizar
				'data'=>array('codigomaterial'=>'js:Tempdpeticion_codart.value'),
			)

		);?>

		<?php IF($model->isNewRecord ){ ?>
<?php
//$datos = CHtml::listData(Ums::model()->findAll(),'um','desum');
			$datos=array();
			echo $form->DropDownList($model,'um',$datos, array( 'disabled'=>$habilitado, 'maxlength'=>4)  )  ;
			?>
		<?php }  else { ?>
			<?php echo $form->DropDownList($model,'um',Alconversiones::Listadoums($model->codart), array('empty'=>'--Um--', 'disabled'=>$habilitado, 'maxlength'=>4)  )  ; ?>


		<?php   } ?>

		<?php echo $form->error($model,'um'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php echo $form->textField($model,'codcen',array('size'=>4,'maxlength'=>4, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>


<div class="row">
		<?php echo $form->labelEx($model,'codal'); ?>
		<?php echo $form->textField($model,'codal',array('size'=>3,'maxlength'=>3, 'disabled'=>'')); ?>
		<?php echo $form->error($model,'codal'); ?>
	</div>



	



	<div class="row">
		<?php echo $form->labelEx($model,'plista'); ?>
		<?php echo $form->textField($model,'plista'); ?>
		<?php echo $form->error($model,'plista'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponibilidad'); ?>
		<?php
		$datos = CHtml::listData(Disponibilidad::model()->findAll(),'codisp','dedispo');
		echo $form->DropDownList($model,'disponibilidad',$datos, array('empty'=>'--Disponibilidad--')  )  ;
		?>

		<?php echo $form->error($model,'disponibilidad'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'imputacion'); ?>
		<?php
			$this->widget('ext.matchcode.MatchCode',array(
				'nombrecampo'=>'imputacion',
				//'pintarcaja'=>1, ///indica si debe de pintar el textbox al iniciar
				'ordencampo'=>7,
				'controlador'=>'Tempdpeticion',
				'relaciones'=>$model->relations(),
				'tamano'=>10,
				'model'=>$model,
				'form'=>$form,
				'nombredialogo'=>'cru-dialog3',
				'nombreframe'=>'cru-frame3',
				'nombrearea'=>'hipogeas',
				//'nombrecampoareemplazar'=>'imputacion',
				//'comopintar'=>'c_descri',//Significa que va a ha reemplazar al imput del campo
			));

				echo $form->error($model,'imputacion');

				?>
	</div>




	<div class="row">

		
	</div>





	<div class="row">
		<?php echo ($model->isNewRecord)?$form->hiddenField($model,'hidpeticion',array('value'=>$idcabeza)):""; ?>
	
		
	</div>

