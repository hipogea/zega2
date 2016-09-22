<?php
/* @var $this DetguiController */
/* @var $model Detgui */
/* @var $form CActiveForm */
?>

<div class="wide form">
 <?php  
 //$habil=$this->eseditablecab($model->detgui->ne->n_guia);
    $habilitado='disabled'; //Siempre empezando por el lado mas restrictivo, asumimos que no hay permiso
     //if (isset($_GET['ed'])) {   //si alguien coloco la URL EDITAR
     		//if ($_GET['ed']=='si') //si se presiono la opcion editar
     			if ($habil==='si') //si es editable la guia (VERIFICADO EN BASE DE DATOS)
     			   $habilitado='';
     
    // $habilitado='';

//echo "habil  ".($habil==='si');
          


  ?>

		<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'detgui-form',
	'enableClientValidation'=>true,
   
	'enableAjaxValidation'=>false,
	



)); ?>




	<?php echo $form->errorSummary($model); ?>
    
    
    
    

	<div class="row">
		
		<?php $form->hiddenField($model,'hidne'); ?>
		
	</div>

    
    <div class="panelizquierdo" >
         
         <div class="row">
		<?php echo $form->labelEx($modelopadre->ne,'c_numgui'); ?>
		<?php echo $form->textField($modelopadre->ne,'c_numgui',array('size'=>8,'maxlength'=>8,'disabled'=>'disabled')); ?>
            

	</div>
        <div class="row">
		<?php echo $form->labelEx($modelopadre,'c_itguia'); ?>
		<?php echo $form->textField($modelopadre,'c_itguia',array('size'=>4,'maxlength'=>4,'disabled'=>'disabled')); ?>
            

	</div>
	<div class="row">
		<?php echo $form->labelEx($modelopadre,'n_cangui'); ?>
		<?php echo $form->textField($modelopadre,'n_cangui',array('size'=>4,'maxlength'=>4,'disabled'=>'disabled')); ?>
            

	</div>
        <div class="row">
		<?php echo $form->labelEx($modelopadre,'c_descri'); ?>
		<?php echo $form->textField($modelopadre,'c_descri',array('size'=>40,'maxlength'=>40,'disabled'=>'disabled')); ?>
            

	</div>
        
    </div>
	

    <div class="panelderecho" >


    <div class="row">
		<?php echo $form->labelEx($model,'hidot'); ?>
		<?php

		
			$this->widget('ext.matchcode.MatchCode',array(
					'nombrecampo'=>'hidot',
					'ordencampo'=>4,
					'controlador'=>'Neot',
					'relaciones'=>$model->relations(),
					'tamano'=>6,
					'model'=>$model,
					'form'=>$form,
					'nombredialogo'=>'cru-dialog3',
					'nombreframe'=>'cru-frame3',
					'nombrearea'=>'fehe367uudrfddj',
				)

			);
		
			//echo CHtml::textField('Saccc',$model->trabajadores->ap.'-'.$model->trabajadores->ap.'-'.$model->trabajadores->nombres,array('disabled'=>'disabled','size'=>40)) ;

		
		?>

		
		<?php echo $form->error($model,'hidot'); ?>
	</div>
        <br>
        <br>
        <div class="row">
		<?php echo $form->labelEx($model,'cant'); ?>
		<?php echo $form->textField($model,'cant',array('size'=>3,'maxlength'=>3)); ?>
          

	</div>
        <div class="row">
      <?php echo $form->error($model,'cant'); ?>
    </div>
        
        <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>
        
    
    </div>
    
    
    
    
    
    <?php
$this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'detalle-grid',
      'dataProvider'=>Neot::model()->search_por_ne(13),
      'mergeColumns' => array('numero','textoactividad'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	  'extraRowColumns' => array('numero'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_cant'])) $totals['sum_cant'] = 0;
		 $totals['sum_cant']+=$data['cant'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total OT : ".MiFactoria::decimal($totals["sum_cant"],2)." </span>"',
	 'extraRowPos'=>'below',
                 
	
	//'filter'=>$model,
	'columns'=>array(
                'cant',
		array('name'=>'numero','value'=>'$data->detalleot->ot->numero'),
                'detalleot.item',
             array('name'=>'textoactividad','value'=>'$data->detalleot->textoactividad'),
            'detalleot.ot.objetosmaster.masterequipo.descripcion',
            'detalleot.ot.objetosmaster.identificador',

            /*
            'detot.textocorto',
                ' detot.codobjeto',
               'detot.nombreobjeto',
              'detot.descripcion',*/
         
				array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

    
    
    
    
    
    
    
    
    
    
    
    
	

<?php $this->endWidget(); ?>

</div><!-- form -->



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>