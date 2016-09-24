<?php
/* @var $this CoordocsController */
/* @var $model Coordocs */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coordocs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="panelizquierdo">

		<div class="row">
			<?php echo $form->labelEx($model,'sociedad'); ?>
			<?php $data=CHTml::listData(Sociedades::model()->findall(),'id','dsocio'); ?>
			<?php echo $form->dropDownList($model,'sociedad',$data,array('empty'=>'Seleccione la sociedad')); ?>
			<?php echo $form->error($model,'sociedad'); ?>
		</div>
	<div class="row">
		<?php echo $form->labelEx($model,'nombrereporte'); ?>
		<?php echo $form->textField($model,'nombrereporte',array('size'=>40)); ?>
		<?php echo $form->error($model,'nombrereporte'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'tamanopapel'); ?>
		<?php
		$datos =array('A3'=>'A3','A4'=>'A4','A5-L'=>'A5-L','A5'=>'A5','Letter'=>'Letter','A3-L'=>'A3-L','A4-L'=>'A4-L','Letter-L'=>'Letter-L');

		?>
		<?php echo $form->dropDownList($model,'tamanopapel', $datos, array('prompt' => 'Seleccione Tamaño' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'tamanopapel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>2,'columns'=>4)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xgeneral'); ?>
		<?php echo $form->textField($model,'xgeneral'); ?>
		<?php echo $form->error($model,'xgeneral'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ygeneral'); ?>
		<?php echo $form->textField($model,'ygeneral'); ?>
		<?php echo $form->error($model,'ygeneral'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xlogo'); ?>
		<?php echo $form->textField($model,'xlogo'); ?>
		<?php echo $form->error($model,'xlogo'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'ylogo'); ?>
		<?php echo $form->textField($model,'ylogo'); ?>
		<?php echo $form->error($model,'ylogo'); ?>
	</div>

		<div class="row">
			<?php echo $form->labelEx($model,'comercial'); ?>
			<?php echo $form->checkBox($model,'comercial'); ?>

		</div>


	<div class="row">
	<?php
	if(!$model->isNewRecord ) {
		$ruta='imgreportes'.DIRECTORY_SEPARATOR;
		//$ruta=Yii::app()->params['imgreportes'];
		//$ruta='materiales'.DIRECTORY_SEPARATOR;
		$this->widget('ext.coco.CocoWidget'
			,array(
				'id'=>'cocowidget1',
				'onCompleted'=>'function(id,filename,jsoninfo){  }',
				'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
				'onMessage'=>'function(m){ alert(m); }',
				'allowedExtensions'=>array('jpg','JPG','JPEG','JPG','gif','PNG'), // server-side mime-type validated
				'sizeLimit'=>2000000, // limit in server-side and in client-side
				'uploadDir' => $ruta, // coco will @mkdir it
				// this arguments are used to send a notification
				// on a specific class when a new file is uploaded,
				'buttonText'=>'Subir Imagen',
				'receptorClassName'=>'application.models.Maestrocompo',
				'methodName'=>'FileReceptor',
				'userdata'=>$model->id,
				// controls how many files must be uploaded
				'maxUploads'=>1, // defaults to -1 (unlimited)
				'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
				// controls how many files the can select (not upload, for uploads see also: maxUploads)
				'multipleFileSelection'=>true, // true or false, defaults: true
				//'nombrealt'=>$model->id.'',
			));

	}
	?>

	</div>

	<?php

	/* echo CHtml::image(
          "/recurso/materiales/".$model->codigo.".jpg"
      ,"",
      array('width'=>'240','height'=>'240')

      );*/
	echo Yii::app()->params['imgreportes'].$model->id.".jpg";
	Numeromaximo::Pintaimagen(Yii::app()->params['imgreportes'].$model->id.".JPG",Yii::app()->params['rutaimagenesmateriales']."NODISPONIBLE.JPG",140,140)

	?>


		</div>

		<div class="panelderecho">

	<div class="row">
		<?php echo $form->labelEx($model,'x_grilla'); ?>
		<?php echo $form->textField($model,'x_grilla'); ?>
		<?php echo $form->error($model,'x_grilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'y_grilla'); ?>
		<?php echo $form->textField($model,'y_grilla'); ?>
		<?php echo $form->error($model,'y_grilla'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'registrosporpagina'); ?>
		<?php echo $form->textField($model,'registrosporpagina'); ?>
		<?php echo $form->error($model,'registrosporpagina'); ?>
	</div>

			<div class="row">
				<?php echo $form->labelEx($model,'xresumen'); ?>
				<?php echo $form->textField($model,'xresumen'); ?>
				<?php echo $form->error($model,'xresumen'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'yresumen'); ?>
				<?php echo $form->textField($model,'yresumen'); ?>
				<?php echo $form->error($model,'yresumen'); ?>
			</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tienepie'); ?>
		<?php echo $form->checkBox($model,'tienepie'); ?>

	</div>


			<div class="row">
				<?php echo $form->labelEx($model,'tienelogo'); ?>
				<?php echo $form->checkBox($model,'tienelogo'); ?>

			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'tienecabecera'); ?>
				<?php echo $form->checkBox($model,'tienecabecera'); ?>

			</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estilo'); ?>
		<?php
		$archivos=CFileHelper::findFiles(	$this->rutaestilos,
			array(
				'fileTypes'=>array('css'),
				'exclude'=>array(),
				'level'=>-1,
				'absolutePaths'=>false
			)
		);
		$datos=array_combine($archivos,$archivos);
		//$datos = CHtml::listData(Documentos::model()->findAll(),'coddocu','estilo');

		?>
		<?php echo $form->dropDownList($model,'estilo', $datos, array('prompt' => 'Seleccione un estilo' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'estilo'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'codocu'); ?>
		<?php
		$datos = CHtml::listData(Documentos::model()->findAll(),'coddocu','desdocu');

		?>
		<?php echo $form->dropDownList($model,'codocu', $datos, array('prompt' => 'Seleccione un documento' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'codocu'); ?>
	</div>

	<div class="row">



		<?php echo $form->labelEx($model,'codcen'); ?>
		<?php
		$datos = CHtml::listData(Centros::model()->findAll(),'codcen','nomcen');

		?>
		<?php echo $form->dropDownList($model,'codcen', $datos, array('prompt' => 'Seleccione un centro' // Valor por defecto
		)
		);
		?>
		<?php echo $form->error($model,'codcen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php //echo $form->textField($model,'modelo',array('size'=>60,'maxlength'=>100)); ?>
		<?php
		$datos = $model->enumModels();
		$valores=array();
		foreach ($datos  as $clave => $valor) {
			$valores[$valor]=$valor;
		}
		echo $form->DropDownList
		(	$model,'modelo',$valores,
			array(

				'ajax' => array(
					'type' => 'POST',
					'url' => CController::createUrl('Coordocs/cargacampos'), //  la acción que va a cargar el segundo div
					'update' => '#Coordocs_campofiltro' // el div que se va a actualizar
				),
				'empty'=>'--Escoja el modelo--',
				//'disabled'=>($model->isNewRecord)?'':'disabled',

			)
		);

		?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campofiltro'); ?>
		<?php
		if (!$model->isNewRecord) {

			/*$criterial = new CDbCriteria;
			$criterial->condition='codocu=:docu';
			$criterial->params=array(':docu'=>$model->codocu);
			$datos = CHtml::listData(Estado::model()->findAll( $criterial),'codestado','estado');*/
			$listacampos=array();
			$modeloatrati=new $model->modelo;
			foreach($modeloatrati->getAttributes() as $clave=>$valor){
				$listacampos[$clave]=$clave;
			}

		}
		echo $form->dropDownList($model,'campofiltro', ($model->isNewRecord)?array():$listacampos, array(
				'prompt' => 'Seleccione un campo' // Valor por defecto
			)
		);
		?>
		<?php echo $form->error($model,'campofiltro'); ?>
	</div>

			<div class="row">
				<?php echo $form->labelEx($model,'campoestado'); ?>
				<?php

				echo $form->dropDownList($model,'campoestado', ($model->isNewRecord)?array():$listacampos, array(
						'prompt' => 'Seleccione un campo' // Valor por defecto
					)
				);
				?>
				<?php echo $form->error($model,'campoestado'); ?>
			</div>


			<div class="row">
				<?php echo $form->labelEx($model,'campototal'); ?>
				<?php

				echo $form->dropDownList($model,'campototal', ($model->isNewRecord)?array():$listacampos, array(
						'prompt' => 'Seleccione un campo' // Valor por defecto
					)
				);
				?>
				<?php echo $form->error($model,'campototal'); ?>
			</div>



<div class="row">
<?php
if (!$model->isNewRecord)
echo CHTml::link("Crear Detalle",yii::app()->createUrl('/coordocs/creadetalle',array("id"=>$model->id)));
		?>
		
		</DIV>

		</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Grabar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<?php
if (!$model->isNewRecord)
$this->renderpartial('detalle_grid',array('regi'=>$regi,'idcabeza'=>$model->id));

?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>600,
		'height'=>420,
		'border'=>0,
	),
));
?>
	<iframe id="cru-detalle" style="border:0px; width:100%; height:100%;" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>