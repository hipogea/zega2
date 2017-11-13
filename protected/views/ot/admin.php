<?php
/* @var $this OtController */
/* @var $model Ot */

$this->breadcrumbs=array(
	'Ots'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Nueva orden', 'url'=>array('creadocumento')),
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ot-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
MiFactoria::titulo("Ordenes de servicio", "asterix")
?>


<div class="search-form" style="">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'ot-grid',
      'dataProvider'=>$model->search(),
      'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
      'mergeColumns' => array('numero','codpro','despro'),
	//'itemsCssClass'=>'table table-striped table-bordered table-hover',
			
	// 'extraRowColumns' => array('numero'),
	/* 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_totalneto'])) $totals['sum_totalneto'] = 0;
		 $totals['sum_totalneto']+=$data['totalneto'];

	 },*/
	// 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Oc : ".MiFactoria::decimal($totals["sum_totalneto"],2)." </span>"',
	// 'extraRowPos'=>'below',
      'columns' => array(
		  ARRAY('name'=>'codcen','header'=>'Cent','value'=>'$data->codcen','htmlOptions'=>array('width'=>3)),
          ARRAY('name'=>'numero','header'=>'Num','type'=>'raw','value'=>'CHTml::link($data->numero,Yii::app()->createurl("ot/editadocumento", array("id"=> $data->id )) ,ARRAY("target"=>"_blank"))','htmlOptions'=>array('width'=>10)),
		 ARRAY('name'=>'numero','header'=>'Num','type'=>'raw','value'=>'CHTml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),Yii::app()->createurl("ot/verdocumento", array("id"=> $data->id)) ,array("target"=>"_blank") )','htmlOptions'=>array('width'=>5)),

		  array(
			  'name'=>'fechainicio',
			  'header'=>'F ini',
			  'value'=>'date("d.m.y", strtotime($data->fechainicio))','htmlOptions'=>array('width'=>10)
		  ),
                    array('name'=>'codpro','value'=>'$data->codpro','htmlOptions'=>array('width'=>10)),
		  array('name'=>'despro','value'=>'$data->despro','htmlOptions'=>array('width'=>40)),          
               // array('name'=>'codobjeto','value'=>'$data->codobjeto','htmlOptions'=>array('width'=>3)),
                array('name'=>'textocorto','header'=>'Servicio','value'=>'ucfirst(strtolower($data->textocorto))','htmlOptions'=>array('width'=>100)),
        
          array('name'=>'nombreobjeto','value'=>'$data->nombreobjeto','htmlOptions'=>array('width'=>40)),
                array('name'=>'descripcion','value'=>'$data->descripcion','htmlOptions'=>array('width'=>25)),
               array('name'=>'marca','value'=>'$data->marca','htmlOptions'=>array('width'=>12)),
               array('name'=>'modelo','value'=>'$data->modelo','htmlOptions'=>array('width'=>12)),
               
//array('name'=>'descripcion','value'=>'$data->descripcion."-".$data->marca."-".$data->modelo."-".$data->identificador','htmlOptions'=>array('width'=>400)),
       		  
		 
		      ),
    ));

?>
<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>500,
	),
));
?>
<iframe id="cru-frame3" width="100%" height="100%" style="overflow-y:hidden;overflow-x:hidden;"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

