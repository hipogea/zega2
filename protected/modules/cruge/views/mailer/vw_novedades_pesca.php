<div style="float: left; width:600px;">
	<div style=" width:300px;">

		<?php echo $mensaje; ?>

	</div>
        <div style="float: left; width:300px;">
		<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'styles.css',
		'attributes'=>array(		
		//'codigo',
		//	'tipo',
		'barcoactual.nomep',
		'codigosap',
		'codigoaf',
		'descripcion',
		'marca',
		'modelo',
		'serie',		
		'comentario',
		'fecha',
		'documento.desdocu',		
		'lugares.deslugar',
		'posicion',
		'codigopadre',
		'numerodocumento',
		'adicional',
		//'codigoafant',		
			),
		)); ?>


		</div>

</div>
	


