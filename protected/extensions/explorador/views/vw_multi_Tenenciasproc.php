

<?php $form=$this->beginWidget('CActiveForm', array(
    'enableAjaxValidation'=>true,
	'method'=>'GET',
)); ?>
<div>
	<div class='botones'>
		<?php echo CHtml::imageButton(Yii::app()->getTheme()->baseUrl.'/img/seleccionar.png',array('width'=>25,'height'=>25,'value'=>'Buscar','onClick'=>'Loading.show();Loading.hide();'));?>
	</div>
</div>

<?php
//$model->setScenario('search');
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',   
	'dataProvider'=>$model->search(),
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
									'value'=>'$data->id',
									'checkBoxHtmlOptions' => array(                
											'name' => 'checkselected[]',
											),
           // 'id'=>'cajita' // the columnID for getChecked
							),
	     
	 
	 'id',
	 array(
            'name'=>'hidevento', 
            'value'=>'$data->eventos->descripcion',
            'filter'=>CHtml::listdata(Eventos::model()->findall(),'id','descripcion'), 
                  ),
             array(
            'name'=>'codocu',
            'value'=>'$data->eventos->docume->desdocu',
            'filter'=>CHtml::listdata(Documentos::model()->findall("controlfisico='1'"),'coddocu','desdocu'),
                  ),  
          //  'codte',
				   array(
            'name'=>'codte',
            'value'=>'$data->codte',
            'filter'=>CHtml::listdata(Tenencias::model()->findall(),'codte','deste'),
                  ),
		
		
	),
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton('Seleccionar'); ?>
	</div>
<?php $this->endWidget(); ?>