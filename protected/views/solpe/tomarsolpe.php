<?php
/* @var $this SolpeController */
/* @var $model Solpe */

$this->breadcrumbs=array(
	'Solpes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Crear solicitud', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#solpe-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'22010.png');  ?> Tomar solicitudes</h1>



<?php echo CHtml::link('Filtro','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_searchsolpeparacomprar',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'ponercarro',
    'enableAjaxValidation'=>false,
)); ?>


<?php $gridWidget= $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solpe-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
		//
		'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'dataProvider'=>$gridDataProvider,
			//'template'=>"{items}",
	'columns'=>array(
        array(
            'class'=>'CCheckBoxColumn',
            'selectableRows' => 20,
            'value'=>'$data->id',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]'),
            // 'id'=>'cajita' // the columnID for getChecked
                      ),
		array('name'=>'numero','type'=>'raw','value'=>'CHtml::link($data->numero,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->identidad ) ) )'),
		
		//'numsolpe',
		'item',
		'cant',
        array('name'=>'cantatendida','header'=>'Atendido','type'=>'raw','value'=>'(is_null($data->cantatendida)?0:MiFactoria::decimal($data->cantatendida,2))'),
        array('name'=>'cant_pendiente','header'=>'Falta','type'=>'raw','value'=>'(is_null($data->cant_pendiente)?$data->cant:MiFactoria::decimal($data->cant_pendiente,2))'),

        'desum',
		'codart',
		'txtmaterial',
		'imputacion',
		'fechaent',
		//array('name'=>'codal','type'=>'raw','value'=>'CHtml::link($data->codal,Yii::app()->createurl(\'/almacendocs/atiendesolpe\', array(\'id\'=> $data->hidsolpe ) ) )'),
		array('name'=>'codal','type'=>'raw','value'=>'($data->est=="30")?CHtml::link($data->codal,"#" , array(\'onclick\'=>\'$("#cru-detalle").attr("src","\'.Yii::app()->createurl(\'/solpe/reservaitem\', array(\'id\'=> $data->id, \'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialogdetalle").dialog("open"); return false;\',)):$data->codal'),
		'centro',
		'usuario',
		'est',
		
	),
)); ?>

<?PHP
    //Capture your CGridView widget on a variable
    //$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
    $this->renderExportGridButton($gridWidget,'Exportar',array('class'=>''));
?>

<?PHP
$opajax=array(
    'type'=>'POST',
    'url'=>Yii::app()->createUrl('/Solpe/poneralcarro'),
    //'success'=>'reloadGrid',
    'update'=>'#maletin',
) ;
echo "<div class='botones'>";

ECHO CHtml::ajaxLink(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/maletin.png','Poner al carro',array('width'=>25,'height'=>28)),array('solpe/poneralcarro'),
    $opajax ,  array('class'=>'')   );




//echo CHtml::Ajaxlink(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/imprimir.png'),array('/Solpe/poneralcarro'),$opajax);
//echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/imprimir.png'),array('/solpe/imprimir2','id'=>$model->idguia));
echo "</div>";
?>
<?PHP
$opajax=array(
    'type'=>'POST',
    'url'=>Yii::app()->createUrl('/Solpe/poneralcarro'),
    //'success'=>'reloadGrid',
    'update'=>'#maletin',
) ;
echo "<div class='botones'>";

ECHO CHtml::ajaxLink(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/clean.png','Poner al carro',array('width'=>25,'height'=>28)),array('solpe/limpiarcarro'),
    $opajax ,  array('class'=>'')   );




//echo CHtml::Ajaxlink(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/imprimir.png'),array('/Solpe/poneralcarro'),$opajax);
//echo CHtml::link(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/imprimir.png'),array('/solpe/imprimir2','id'=>$model->idguia));
echo "</div>";
?>

<?PHP
$opajax=array(
    'type'=>'POST',
    'url'=>Yii::app()->createUrl('/Solpe/pideoferta'),
    'success'=>"function(data) {
										$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');


                                        }",
    'beforeSend' => 'js:function(){
                                  				 var r = confirm("Esta seguro de Enviar peticiones de oferta?");
                          						 if(!r){return false;}
                               							 }
                               					',

    //'success'=>'reloadGrid',
   // 'update'=>'#maletin',
) ;
echo "<div class='botones'>";

ECHO CHtml::ajaxLink(Chtml::image(Yii::app()->getTheme()->baseUrl.'/img/email.png','Pedir oferta',array('width'=>25,'height'=>28)),array('solpe/pideoferta'),
    $opajax ,  array('class'=>'')   );
echo "</div>";
?>
<div id="AjFlash" class="flash-regular">.</div>

<?php

$this->endWidget();

?>


<DIV ID="PEPA"></DIV>




<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>