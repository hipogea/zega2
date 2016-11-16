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
	$('#solpe-gridex').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Solicitudes de pedido</h1>
<?php $this->widget('ext.loading.LoadingWidget'); ?>


<?php echo CHtml::link('Filtro','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_searchpendientes',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->



    <div id='AjFlash' class="flash-regular" ></div>

<?php //$this->widget('ext.groupgridview.GroupGridView', array(
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'solpe-gridex',
	'dataProvider'=>$model->search_por_pendiente(),
   // 'mergeColumns' => array('numero','item','desum','codart','txtmaterial'),
    //'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',  // your version of css file
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
    //'filter'=>$model,
		//'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'dataProvider'=>$gridDataProvider,
			//'template'=>"{items}",
	'columns'=>array(
        //array('name'=>'id','header'=>'Reserva','value'=>'$data->id'),
        array(
            'class'=>'CCheckBoxColumn',
            'selectableRows' => 20,
            'value'=>'$data->iddesolpe',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]'),
            // 'id'=>'cajita' // the columnID for getChecked
        ),
       // 'idreserva',
        array('name'=>'numero','type'=>'raw','value'=>'CHtml::link($data->numero,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->idreserva ) ) )'),
         'desdocu_reserva',
        //'estadoreserva',
        array('name'=>'fecha_reserva','value'=>'date("d.m.Y", strtotime($data->fecha_reserva))'),
  'idreserva',
		//'numsolpe',
		'item',
        'cantdesolpe',
		'cantidad_reservada',
		'desum',
		'codart',
        array('name'=>'txtmaterial','value'=>'$data->txtmaterial','htmlOptions'=>Array('width'=>200)),
		//'txtmaterial',
        'codal',
		//'fechacrea',
		//'fechaent',
		//array('name'=>'codal','type'=>'raw','value'=>'CHtml::link($data->codal,Yii::app()->createurl(\'/almacendocs/atiendesolpe\', array(\'id\'=> $data->hidsolpe ) ) )'),
		//array('name'=>'codal','type'=>'raw','value'=>'($data->est=="03")?CHtml::link($data->codal,"#" , array(\'onclick\'=>\'$("#cru-detalle").attr("src","\'.Yii::app()->createurl(\'/solpe/reservaitem\', array(\'id\'=> $data->id, \'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialogdetalle").dialog("open"); return false;\',)):$data->codal'),
		'centro',
        array('name'=>'cantidad_atendida','value'=>'($data->cantidad_atendida>0)?MiFactoria::decimal($data->cantidad_atendida,3):""'),
        array('name'=>'cantidad_pendiente','value'=>'($data->cantidad_pendiente>0)?MiFactoria::decimal($data->cantidad_pendiente,3):""'),
		'usuario_reserva',

        array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('width'=>50),
            'buttons'=>array(
                'update'=>
                    array(
                        'visible'=>'true',
                        'url'=>'$this->grid->controller->createUrl("/solpe/tratareserva/",
										    array("id"=>$data->idreserva,)
									    )',
                        'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
                        'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
                        'label'=>'Actualizar Item',
                    ),
               /* 'view'=>
                    array(
                        'visible'=>'($data->codocu=="800")?true:false',
                        'url'=>'$this->grid->controller->createUrl("/solpe/Solpeautomatica",array("id"=>$data->idreserva))',
                       // 'options' => array('onClick'=>'Loading.show();Loading.hide(); ', 'ajax' => array('type' => 'GET','confirm'=>'Estaseguro de borrar?',  'success' => 'js:function(data) { $.fn.yiiGridView.update("solpe-gridex")}' ,'url'=>'js:$(this).attr("href")')) ,
                        'options' => array( 'ajax' => array('type' => 'POST','confirm'=>'Esta seguro de comprar los items seleccionados ?','success' => 'js:function() { $.fn.yiiGridView.update("solpe-gridex"); alert("Se compro el Item");}','url'=>'js:$(this).attr("href")')) ,
                        'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'02206.png',
                        'label'=>'Solicitar a compras',
                    ),*/

                'view' => array
                (
                    'visible'=>'($data->codocu==800)?true:false',
                    'label'=>' Solicitar compra',
                    'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'22060.png',
                    'click'=>"function(){
                                    $.fn.yiiGridView.update('solpe-gridex', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
$.growlUI('Growl Notification', data); 
                                              $.fn.yiiGridView.update('solpe-gridex');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url'=>'$this->grid->controller->createUrl("/solpe/Solpeautomatica",array("id"=>$data->idreserva))',

                ),




                'delete'=>
                    array(
                        'visible'=>'false',
                        /*'url'=>'$this->grid->controller->createUrl("/solpe/anulareserva",array("id"=>$data->id))',
                        'options' => array('onClick'=>'Loading.show();Loading.hide(); ', 'ajax' => array('type' => 'GET',  'success' => 'js:function(data) { $.fn.yiiGridView.update("solpe-gride")}' ,'url'=>'js:$(this).attr("href")')) ,
                        'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'02407.png',
                        'label'=>'Anular',
                         ),*/
                     ),
             ),
		
	),
))); ?>


	
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