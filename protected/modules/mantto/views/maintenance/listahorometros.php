<?php
/* @var $this InventarioController */
/* @var $model Inventario */
/* @var $form CActiveForm */
?>
<div class="division">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'inventario-form',
	'enableClientValidation'=>true,
    'clientOptions' => array(
         'validateOnSubmit'=>true,
         'validateOnChange'=>true       
     ),
	'enableAjaxValidation'=>FALSE,
)); ?>
   
	


  <div class="panelizquierdo">
	
	

	  <div class="row">
		  <?php echo $form->labelEx($model,'tipo'); ?>
		  <?php 
		  $datos = CHtml::listData(Tipoactivos::model()->findAll(),'codtipo','destipo');
		  echo $form->DropDownList($model,'tipo',$datos, array('disabled'=>'disabled','empty'=>'--Indique el tipo--')  )  ;	?>
		  <?php echo $form->error($model,'tipo'); ?>
	  </div>
	  
					<div class="row">
							<?php echo $form->labelEx($model,'codarea'); ?>
							<?php  $datos = CHtml::listData(Areas::model()->findAll(array('order'=>'area')),'codarea','area');
								echo $form->DropDownList($model,'codarea',$datos, array('disabled'=>'disabled','empty'=>'--Seleccione un area--')  )  ;
								?>
							<?php echo $form->error($model,'codarea') ?>
					</div>
			
	



		<div class="row">
		<?php echo $form->labelEx($model,'codpropietario'); ?>
	<?php  $datos = CHtml::listData(Centros::model()->findAll(array('order'=>'nomcen')),'codcen','nomcen');
					echo $form->DropDownList($model,'codpropietario',$datos, array('disabled'=>'disabled','empty'=>'--Llene el Propietario--'));
					?>
          <?php echo $form->error($model,'codpropietario'); ?>
	</div>
		
             

	 <div class="row">
		<?php echo $form->labelEx($model,'codigosap'); ?>
		<?php echo $form->textField($model,'codigosap',array('disabled'=>'disabled','size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codigosap'); ?>
	</div>
	 <div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('disabled'=>'disabled','size'=>30,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	
	 <div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('disabled'=>'disabled','size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	 <div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('disabled'=>'disabled','size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'codigoaf'); ?>
		<?php echo $form->textField($model,'codigoaf',array('disabled'=>'disabled','size'=>14,'maxlength'=>14)); ?>
		<?php echo $form->error($model,'codigoaf'); ?>
	</div>
      
      <div class="row">
		<?php echo $form->labelEx($model,'tienecarter'); ?>
		<?php echo $form->checkBox($model,'tienecarter',array('disabled'=>'disabled',));?>
		<?php echo $form->error($model,'tienecarter'); ?>
	</div>	
	  </div>
	

	<div class="panelderecho">
			
	
	

	
	

	<div class="row">
		<?php echo $form->labelEx($model,'serie'); ?>
		<?php echo $form->textField($model,'serie',array('disabled'=>'disabled','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'serie'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php      $this->widget(
                        'application.components.booster.widgets.TbRedactorJs',
                                array(
                                'name' => 'some_text_field',
                                    'model'=> $model,
                                    'attribute'=>'comentario',
                                    'htmlOptions'=>array('disabled'=>'disabled','rows'=>25,'cols'=>50),
                                )
                            );?>
              <?php echo $form->error($model,'comentario'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horometro-grid',
	//'filter'=>$model,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=> $proveedor,	
	//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	'columns'=>array(
           // 'numero',
            array(
			'class'=>'CButtonColumn',
                    'template'=>'{update}{view}',
                    'htmlOptions'=>array('width'=>100),
			 'buttons'=>array(
                       'update'=> array(
					 'url'=>'$this->grid->controller->createUrl("/mantto/Maintenance/AjaxShowDocumentsPoints", array("id"=>$data->id))',
					 'options' => array(
						 'ajax' => array(
							 'type' => 'GET',
							 'success'=>"function(data) {
							 $('#lecturas').html(data);
                                                                       }",
							 'url'=>'js:$(this).attr("href")'


						 ),

					 ) ,
					 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'History.png',
					 'label'=>'See Measures',
				 ),

			 'view'=>
                            array(
                                'url'=>'$this->grid->controller->createUrl(
                                    "/mantto/Maintenance/CreateValuePoint",
					array("id"=>$data->id,																					      
                                                "asDialog"=>1,
                                                "gridId"=>$this->grid->id
                                                )
                                                                            )',
                                    'click'=>'function(){
                                        $("#cru-frame1").attr("src",$(this).attr("href")); 
					$("#cru-dialog1").dialog("open");  
					return false;
						 }',
				'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'mas.png', 
			'label'=>'Add Measure', 
                                ),

                            ),
		),
	 	array('name'=>'Codigo','header'=>'Code','value'=>'$data->codigo'),
		array('name'=>'ubicacion','header'=>'Location','value'=>'$data->ubicacion'),
            array('name'=>'fechainicio','header'=>'Begin Date','value'=>'$data->fechainicio'),
             array('name'=>'lecturaactual','header'=>'Current Value','value'=>'$data->lecturaactual'),
		array('name'=>'unidades','header'=>'Unit Measur','value'=>'$data->ums->desum'),
		
		//array('name'=>'nada','type'=>'raw','header'=>'Notificar','value'=>'CHtml::link("Responder","#",array("onclick"=>$(#cru-frame1).attr("src",""); $(#cru-dialog1).dialog("open");))' ),
		
	),
)); 

?>
<div id="lecturas">
    
</div>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog1',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>300,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame1" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

</div>