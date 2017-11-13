<?php
/* @var $this DailyworkController */
/* @var $model Dailywork */
/* @var $form CActiveForm */
?>

<div class="form">
    <div class="wide form">
        
    <div class="division">
<?php /** @var TbActiveForm $form */
$form = $this->beginWidget(
	'booster.widgets.TbActiveForm',
	array(
		'id' => 'horizontalForm',
		'type' => 'horizontal',
	)
); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
   
           <div class="row">
		<?php echo $form->labelEx($model,'hidturno'); ?>
		<?php echo $form->DropDownList($model,'hidturno',$datoscomboturno ,array( 'disabled'=>'' ,  'empty'=>'--Choose Shift--')); ?>
	<?php echo $form->error($model,'hidturno'); ?>
            <?php //echo $model->ot->textocorto; ?>
	</div>
 <div class="row">
                    <?php echo $form->labelEx($model,'codproyecto'); ?>
		<?php 	
			
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'model'=>$model,
			'attribute'=>"codproyecto",
                        'source'=>Yii::app()->createUrl('request/suggestotsimple'),
                        'options'=>array(
				'showAnim'=>'fold',),
                            
                         'htmlOptions'=>array(
                                    'ajax'=>array( 
                                                'type'=>'POST', 
                                                'data'=>array('codigoproyecto'=>'js:Dailyturno_codproyecto.value'),
                                                'url'=>Yii::app()->createUrl($this->module->id.'/dailywork/ajaxproyecto'),
						'success'=>'js:function(data){$("#Dailyturno_desobjeto").val(data);}',
                         
                                                ) ,
                                            'size'=>'14',
                                              //'disabled'=>($model->escampohabilitado('codcompo'))?'':'disabled',
                                                    ),   
                             		));
                
               
               // echo $form->textField($model,'codproyecto',array('disabled'=>'disabled','size'=>12)); 
                    
                
                ?>
                  <?php //echo $form->textField($model,'desobjeto',array('disabled'=>'disabled','value'=> Ot::findByNumero($model->codproyecto)->textocorto)); ?>
                  
                   <?php echo $form->error($model,'codproyecto'); ?>
		</div>  

       <div class="row">
           <?php echo $form->colorpickerGroup(
			$model,
			'color',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5'
				),
				'hint' => 'Color fields, not bad',
			)
		); ?>
       </div>
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        
    
   

<?php $this->endWidget(); ?>
        </div>
</div>
    </div>

<?php 
//var_dump($proveedor);die(); 
$this->widget('ext.groupgridview.GroupGridView', array(
   // $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
      'id' => 'ot2-grid',
     'summaryText'=>'',
      'dataProvider'=>$proveedor,
      'mergeColumns' => array('codproyecto'),
    'extraRowColumns' => array('codproyecto'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_horasdia'])) $totals['sum_horasdia'] = 0;
		 $totals['sum_horasdia']+=$data->regimen['horasdia'];

	 },
                  'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Shift Total Hours  : ".MiFactoria::decimal($totals["sum_horasdia"],2)." </span>"',
	 'extraRowPos'=>'below',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
           // array('name'=>'id','type'=>'raw','header'=>'','value'=>'CHtml::link(CHtml::openTag("span",array("class"=>"icon icon-folder-plus icon-green icon-fuentesize18"),true),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/mantto/dailywork/creaevento\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )   '),
             //array('header'=>'Ev','type'=>'html','value'=>'CHtml::openTag("span",array("class"=>"badge badge-error")).$data->neventos.CHtml::closeTag("tag")' ),
	array('name'=>'id','type'=>'raw','header'=>'D','value'=>'CHtml::ajaxLink(CHtml::openTag("span",array("class"=>"fa fa-mx fa-color-purple fa-minus"),true),Yii::app()->createurl(\'/mantto/dailywork/ajaxDeleteShift\', array(\'id\'=> $data->id ) ),array("type"=>"GET","success"=>"js:function(data) { $.fn.yiiGridView.update(\'ot2-grid\'); $.notify(data, \"info\");       }")   ) '),
                 'codproyecto',
            array('name'=>'turno','type'=>'html', 'value' => '$data->regimen->desregimen'),
            array('name'=>'hinicio','type'=>'html', 'value' => '$data->regimen->hinicio'),
            array('name'=>'hfinal','type'=>'html', 'value' => 'date("H:i",strtotime($data->regimen->getLimiteSuperior(date("Y-m-d"))))'),
              array('name'=>'horasdia','type'=>'html', 'value' => '$data->regimen->horasdia'),
          array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'color','type'=>'html',
               // 'header'=>'$data->getAttributeLabel("hmi")',
                //'value' => '$data->hmi.CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."clock.png","Press To See",array("onClick"=>"js:$.notify(\'Hi! Look here!\', \'info\')")',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                    'url' => $this->createUrl('dailywork/updatedailydet'),
                    'params'=>array('modelito'=>get_class($model)),
                    'placement' => 'right',
                   'inputclass' => 'input-medium',
                    'htmlOptions'=>array('id'=>'"modern".$data->id',                        
                       // "onmouseover"=>"js:$.notify(\'Hi! Look here!\', \'info\')"
                        ),
                    'success' => 'reloadGrid',
                    //'mode'=>'inline'
                ),
                
            ),
	),
)); 

?>

<?php

//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Evento',
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
unset($form);
//--------------------- end new code --------------------------
?>

<?PHP
echo CHtml::script(" function reloadGrid(data) {
    $.fn.yiiGridView.update('ot-grid');
} ");

?>