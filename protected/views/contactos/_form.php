<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>


<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contactos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	

	<div class="row">
	 <?php echo $form->labelEx($model,'c_hcod'); ?>
		<?php 
		if($model->isNewRecord )
		    {
													
		  $datos = CHtml::listData(Clipro::model()->findAll(array('order'=>'despro')),'codpro','despro');
		  echo $form->DropDownList($model,'c_hcod',$datos, array('empty'=>'--Seleccione una empresa--',) ) ;				
											
											
											
												} else  {
													//echo "el contacto es : ".$codpro;
												echo $form->textField($model,'c_hcod',array('disabled'=>'disabled','size'=>6)); 	
												echo CHtml::textField('df',$model->contactos_clipro->despro,array('disabled'=>'disabled','size'=>36)); 	
												}
			
			
			?>
		
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_nombre'); ?>
		<?php echo $form->textField($model,'c_nombre',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_cargo'); ?>
		<?php echo $form->textField($model,'c_cargo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_tel'); ?>
		<?php echo $form->textField($model,'c_tel',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_tel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_mail'); ?>
		<?php echo $form->textField($model,'c_mail',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'c_mail'); ?>
	</div>

	
	<div class="row">
	<?php echo $form->labelEx($model,'fecnacimiento'); ?>
		<?php
							    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										//'name'=>'my_date',
										'model'=>$model,
										'attribute'=>'fecnacimiento',
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:120px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));

								?>		
	</div>















































	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>



</div><!-- form -->
	</div>

<?php

	/*$this->widget('ext.bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'itemsCssClass'=>'table table-striped table-bordered table-condensed',
	'dataProvider'=>Contactosadicio::model()->search_por_contacto($model->id),
	'columns'=>array(
	array(
	'class' => 'ext.editable.EditableColumn',
	'name' => 'mail',
	'headerHtmlOptions' => array('style' => 'width: 110px'),
	'editable' => array(
	'url'        => $this->createUrl('contactos/update'),
	'placement'  => 'right',
	'inputclass' => 'span3',
	)
	),




	),
	));
*/


?>
	<?php
  		 if(!$model->isNewRecord) {
	   ?>

	   <?PHP
          // var_dump($_GET);
           
           
	   $this->widget('zii.widgets.grid.CGridView', array(
	   'id'=>'detalle-grid',
		   'itemsCssClass'=>'table table-striped table-bordered table-hover',
	   'dataProvider'=>$modeldetalle->search_por_contacto($model->id),
	  'filter'=>$modeldetalle,
// 'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	   'summaryText'=>'->',
	   'columns'=>array(
              'id',
               array(
            'name'=>'codocu',
            'value'=>'$data->codocu',
            //'filter'=>CHtml::listdata(Documentos::model()->findall("controlfisico='1'"),'coddocu','desdocu'),
                  ),  
                array(
            'name'=>'codocu',
            'value'=>'$data->documentos->desdocu',
            'filter'=>CHtml::listdata(Documentos::model()->findall("controlfisico='1'"),'coddocu','referencia'),
                  ),  
	   //'documentos.desdocu',
	   'mail',
               /* ARRAY('name'=>'activo','type'=>'raw',
                    'value'=>'CHtml::ajaxLink(CHtml::openTag("span",array("class"=>"icon icon-".(($data->activo==\'1\')?\'checkmark\':\'checkmark2\')." icon-blue icon-fuentesize16"),true),'
                   . '$this->grid->controller->createUrl("contactos/ajaxdesactivacontatodetalle", array("id"=>$data->id)),'
                   . 'array("type" => "GET", '
                     . '"url" => $this->grid->controller->createUrl("contactos/ajaxdesactivacontatodetalle", array("id"=>$data->id)), '
                    . '"data"=>array("identificadordetalle"=>$data->id), "success"=>"function(data) { $.fn.yiiGridView.update(\"detalle-grid\"); return true; }"  ),array() )',
                     
                    ),
               
	    array(
	   'class'=>'CCheckBoxColumn',
	   'value'=>'$data->id',
            'checkBoxHtmlOptions' => array( 
                
                                                 "ajax" => array(
                                                         "type"=>"POST", 
                                                         "url"=> Yii::app()->createUrl("contactos/ajaxdesactivacontatodetalle",array()),
                                                         "data" =>array("identificadordetalle" =>'$data->id'),
                                                        "success" => "function(data){ $.fn.yiiGridView.update(\"detalle-grid\"); return false;}",
                                                        "error"=>"function (xhr, ajaxOptions, thrownError){
                                                            alert(xhr.statusText);
                                                            alert(thrownError);}", 
                                                        )
                )
	   ),
                */ 
              array(
        'header'=>'Status',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->activo",
                                   $data->activo,
                                   array(
                                    
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
             

	   array(
	   'htmlOptions'=>array('width'=>400),
	   'class'=>'CButtonColumn',
		   'template'=>'{update}{delete}{view}',
	   'buttons'=>array(
	   'update'=>array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("/contactos/modificadetalle/",
	   array("id"=>$data->id,
	   "asDialog"=>1,
	   "gridId"=>$this->grid->id,
	   )
	   )',
	   'click'=>('function(){
	   $("#cru-frame").attr("src",$(this).attr("href"));
	   $("#cru-dialog").dialog("open");
	   return false;
	   }'),
	   'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
	   'label'=>'Actualizar Item',
	   ),


	   'delete'=>

	   array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("/contactos/borradetalle", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   'onClick'=>'Loading.show();Loading.hide(); ',
	   ) ,
	   'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
	   'label'=>'Ver detalle',
	   ),
             'view'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("contactos/ajaxdesactivacontactodetalle", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,
	   'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."check16.png",
	   'label'=>'Ver detalle',
	   ),
               
	   ),
	   ),
	   ),
	   )); ?>



	   <?php
	   $createUrl = $this->createUrl ( '/contactos/creaadicional' ,
		   array (
			   //"id"=>$model->n_direc,
			   "asDialog" => 1 ,
			   "gridId" => 'detalle-grid' ,
			   "idcabeza" => $model->id ,
		   )
	   );
	   echo CHtml::link ( 'Agregar ' , '#' , array ( 'onclick' => "$('#cru-frame').attr('src','$createUrl'); $('#cru-dialog').dialog('open');" ) );
	   ?>

   <?php
   }
   ?>

<?php $this->endWidget(); ?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>500,
	),
));
?>
	<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>