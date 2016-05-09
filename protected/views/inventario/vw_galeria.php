	<h1> <?PHP echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'camara.png'); ?>
	Gestionar las Fotos </h1>
	<p>Para solicitar eliminar la fotografia presione la opcion radio, para eliminarla
	directamente, presione el aspa ( puede que necesite autorizaciones )</p>
<?php
$arrayimagenes=array();
$aff=array();
$ruta=Yii::app()->params['rutafotosinventario_'];
foreach ($fotos as $valor) {		     
									 
									// CHtml::link("(".$i.")","#",array('onmouseover'=>"document.images['gatito'].src='".$ruta.$valor."';"));
									array_push($arrayimagenes,CHtml::image($ruta.$valor,$valor,ARRAY("width"=>70,"height"=>70)));
									//array_push($aff,
									//$i=$i+1;
								}
$this->widget('ext.imagegallery1.ImageGallery1',array(
	'images'=>$arrayimagenes,
	'action'=>array('/inventario/borrafotos'),	
	'modelId'=>$modelo->idinventario,		// $model->primarykey (as an example)
 	'selectedImageId'=>$arrayimagenes[0],	// the ID for your image...any unique ID
	'onSuccess'=>'function(data){  }',
	'onError'=>'function(e){ alert(e);  }',
));
//print_r( json_encode($arrayimagenes));

?>