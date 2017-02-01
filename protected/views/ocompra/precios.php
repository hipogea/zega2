
<div style=" width:300px;  " >
<?php if($codprov=='')$codprov=null;?>
<?php //var_dump(Ocompra::historicoprecios($codigom,$codprov,$codcentro));die();
//var_dump(Ocompra::historicoprecios($codigom,$codprov,$codentro)->getdata());die();
$this->widget('zii.widgets.grid.CGridView', array(
		'summaryText'=>'',
	'id'=>'precios-grid',
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
	//'dataProvider'=>Alentregas::model()->search_por_detcompra($filtro),
		//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

		'dataProvider'=>Ocompra::historicoprecios($codigom,$codprov,$codentro),
	//'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'codentro',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Cen',
			//'value'=>'$data->codentro',
			'htmlOptions'=>array('width'=>10),
		),
		/*array(
			'name'=>'codigoalma',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Alm',
			//'value'=>'$data->codigoalma',
			'htmlOptions'=>array('width'=>10),
		),*/
                array(
			'name'=>'despro',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Proveedor',
			'value'=>'$data["despro"]',
			'htmlOptions'=>array('width'=>100),
		),
            
		array(
			'name'=>'fecdoc',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Fec',
			'value'=>'date("d.m.y", strtotime($data["fecdoc"]))',
			'htmlOptions'=>array('width'=>40),
		),
		array(
			'name'=>'numcot',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'O.c.',
			'value'=>'$data["numcot"]',
			'htmlOptions'=>array('width'=>40),
		),

		/*array(
			'name'=>'punit',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'PU',
			'value'=>'Mifactoria::decimal($data["punit"],2)',
			'htmlOptions'=>array('width'=>40),
		),*/
            array('name'=>'punit', 'type'=>'raw','value'=>'CHtml::openTag("span",array("class"=>"badge badge-important")).Mifactoria::decimal($data["punit"],2).CHtml::closeTag("span")','htmlOptions'=>array('width'=>40)),
		
		array(
			'name'=>'moneda',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Mon',
			'value'=>'$data["moneda"]',
			'htmlOptions'=>array('width'=>15),
		),
		array(
			'name'=>'umbase',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Um',
			'value'=>'$data["desumbase"]',
			'htmlOptions'=>array('width'=>20),
		),



		),
						)

						); 
		?>
</div>