<div class="row">
	<?php echo $form->labelEx($model,'documentos_numeromaxbloqueos'); ?>
	<?php echo $form->textField($model,'documentos_numeromaxbloqueos',array('size'=>2,'maxlength'=>2)); ?>
	<?php echo $form->error($model,'documentos_numeromaxbloqueos'); ?>
</div>
<div class="row">
	<?php echo $form->labelEx($model,'documentos_docmascara'); ?>
	<?php echo $form->textField($model,'documentos_docmascara',array('size'=>18,'maxlength'=>18)); ?>
	<?php echo $form->error($model,'documentos_docmascara'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'documentos_tolerecepfacturaendias'); ?>
	<?php echo $form->textField($model,'documentos_tolerecepfacturaendias'); ?>
	<?php echo $form->error($model,'documentos_tolerecepfacturaendias'); ?>

</div>

<div class="row">
	<?php echo $form->labelEx($model,'documentos_selloagua'); ?>
	<?php echo $form->checkBox($model,'documentos_selloagua'); ?>
	<?php echo $form->error($model,'documentos_selloagua'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'documentos_archivo_sello_agua').'  '.yii::app()->getBaseUrl(false); ?>
	<?php echo $form->textField($model,'documentos_archivo_sello_agua',array('size'=>40,'maxlength'=>40)); ?>
	<?php echo $form->error($model,'documentos_archivo_sello_agua'); ?>
</div>


<div class="row">
<?php
//echo Yii::getPathOfAlias('webroot').$model->documentos_archivo_sello_agua;
 if(!is_null($model->documentos_archivo_sello_agua))
	$ruta=Yii::getPathOfAlias('webroot').$model->documentos_archivo_sello_agua;
	$this->widget('ext.coco.CocoWidget'
		,array(
			'id'=>'cocowidget1',
			'onCompleted'=>'function(id,filename,jsoninfo){  }',
			'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
			'onMessage'=>'function(m){ alert(m); }',
			'allowedExtensions'=>array('JPEG','JPG','gif','PNG'), // server-side mime-type validated
			'sizeLimit'=>2000000, // limit in server-side and in client-side
			'uploadDir' => $ruta, // coco will @mkdir it
			// this arguments are used to send a notification
			// on a specific class when a new file is uploaded,
			'buttonText'=>' Imagen NO APROBADA',
			'receptorClassName'=>'application.models.Maestrocompo',
			'methodName'=>'FileReceptor',
			'userdata'=>'NOAPROBADO',
			// controls how many files must be uploaded
			'maxUploads'=>1, // defaults to -1 (unlimited)
			'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
			// controls how many files the can select (not upload, for uploads see also: maxUploads)
			'multipleFileSelection'=>true, // true or false, defaults: true
			//'nombrealt'=>'',
		));

ECHO CHTml::image(yii::app()->getBaseUrl(false).$model->documentos_archivo_sello_agua.DIRECTORY_SEPARATOR.'NOAPROBADO.JPG','',ARRAY('width'=>80,'height'=>80));

?>


</div>


<div class="row">
	<?php echo $form->labelEx($model,'documentos_controlrecepcion'); ?>
	<?php echo $form->checkBox($model,'documentos_controlrecepcion'); ?>

</div>








<div class="row">

<?php
//echo Yii::getPathOfAlias('webroot').$model->documentos_archivo_sello_agua;
if(!is_null($model->documentos_archivo_sello_agua))
	$ruta=Yii::getPathOfAlias('webroot').$model->documentos_archivo_sello_agua;
$this->widget('ext.coco.CocoWidget'
	,array(
		'id'=>'cocowidget1E',
		'onCompleted'=>'function(id,filename,jsoninfo){  }',
		'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
		'onMessage'=>'function(m){ alert(m); }',
		'allowedExtensions'=>array('JPEG','JPG','gif','PNG'), // server-side mime-type validated
		'sizeLimit'=>2000000, // limit in server-side and in client-side
		'uploadDir' => $ruta, // coco will @mkdir it
		// this arguments are used to send a notification
		// on a specific class when a new file is uploaded,
		'buttonText'=>'Imagen APROBADA',
		'receptorClassName'=>'application.models.Maestrocompo',
		'methodName'=>'FileReceptor',
		'userdata'=>'APROBADO',
		// controls how many files must be uploaded
		'maxUploads'=>1, // defaults to -1 (unlimited)
		'maxUploadsReachMessage'=>'No esta permitido cargar mas archivos', // if empty, no message is shown
		// controls how many files the can select (not upload, for uploads see also: maxUploads)
		'multipleFileSelection'=>true, // true or false, defaults: true
		//'nombrealt'=>'',
	));
ECHO CHTml::image(yii::app()->getBaseUrl(false).$model->documentos_archivo_sello_agua.DIRECTORY_SEPARATOR.'APROBADO.JPG','',ARRAY('width'=>80,'height'=>80));

?>
</div>


<BR>