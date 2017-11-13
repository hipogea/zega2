

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>
<div>
	<div class='botones'>
		<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/pin.png',array('width'=>25,'height'=>25,'value'=>'Buscar','onClick'=>'Loading.show();Loading.hide();'));?>
	</div>
</div>

<?php
          $documento='032';
		$criteria = new CDbCriteria;
		$criteria->condition='codocu=:docu';
		$criteria->params=array(':docu'=>$documento);
		//$post = Post::model()->find($criteria);
	//$datos = CHtml::listData(Estado::model()->find('codocu=:c_hcod', array(':c_hcod'=>$documento)),'codestado','estado');
		//datos = CHtml::listData(Estado::model()->find($criteria),'codestado','estado');
		// $datos = CHtml::listData(Estado::model()->findall($criteria),'codestado','estado');
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	'dataProvider'=>$model->searchlimpio(),
	'summaryText'=>'',
	//'dataProvider'=>VwInventario::model()->search(),
   // 'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'/css/style-grid-busqueda.css',  // your version of css file
    	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	//'summaryText'=>'',
    'filter'=>$model,
	'columns'=>array(
						array(
									'class'=>'CCheckBoxColumn',
									'selectableRows' => 10,
									'value'=>'$data->codigoaf',
									'checkBoxHtmlOptions' => array(                
																'name' => 'checkselected[]',
																	),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	    
		ARRAY('name'=>'codigoaf','header'=>'Codigo Placa','htmlOptions'=>array('width'=>'5')),
		ARRAY('name'=>'codigosap','header'=>'Codigo SAP','htmlOptions'=>array('width'=>'5')),
		ARRAY('name'=>'descripcion','header'=>'Descripcion','htmlOptions'=>array('width'=>'25')),
		ARRAY('name'=>'marca','header'=>'Marca','htmlOptions'=>array('width'=>'10')),
	ARRAY('name'=>'modelo','header'=>'Modelo','htmlOptions'=>array('width'=>'10')),
	  array(
            'name'=>'codlugar',
            'value'=>'$data->lugares->deslugar',
            'filter'=>CHtml::listdata(Lugares::model()->findall(),'codlugar','deslugar'),
                  ),
	 
	 array(
            'name'=>'codestado',
            //'value'=>'$data->estado->estado',
            'filter'=>CHtml::listdata(Estado::model()->findall($criteria),'codestado','estado'),
                  ),
				   array(
            'name'=>'codep',
            //'value'=>'$data->barcoactual->nomep',
            'filter'=>CHtml::listdata(Embarcaciones::model()->findall(),'codep','nomep'),
                  ),
		
		
	),
)); ?>

<?php $this->endWidget(); ?>