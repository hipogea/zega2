<?php
$provedo=Inventario::model()->search_por_lugar($codlugar);
/* print_r($provedo->getKeys());
 yii::app()->end();*/
  //$rutaimagenesx=Yii::getPathOfAlias('webroot.fotosinv').DIRECTORY_SEPARATOR;
 // $baserutacorta=substr($rutaimagenesx,strpos($rutaimagenesx,yii::app()->baseUrl));
 ?>

<?php
MiFactoria::titulo("Activos en este lugar","package");
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codlugar',
		'deslugar',
		'direcciones.c_direc',
		'empresa.despro',
	),
)); ?>
 
<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'dataProvider'=>$provedo,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
	array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."estado".$data->codestado.".png","",array("width"=>15,"height"=>15))'),
		array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		 array(
            'name'=>'imagen',
            'type'=>'html',
          'value'=>'(is_file($data->fotoprimera()["absoluto"]))?
						CHtml::image($data->fotoprimera()["relativo"],$data->codigosap,array(\'width\'=>70,\'height\'=>80)):
						"--"'
                     //'value'=>'$data->fotoprimera()["absoluto"]',
		           ),
		array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/update","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'),
		array('name'=>'.','header'=>'.','type'=>'raw','value'=>'(!$data->rocoto=="1")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ancla.png","",array("width"=>15,"height"=>15)):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."truck.png","",array("width"=>15,"height"=>15))','htmlOptions'=>array('width'=>'50')),
		array('name'=>'descripcion','header'=>'Descripcion del activo','value'=>'$data->descripcion'),
		'desdocu',
		array('name'=>'fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		'numerodocumento',
		
		
	),
)); 
?>


