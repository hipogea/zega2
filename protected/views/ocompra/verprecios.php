


<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider'=>$proveedor,
      'mergeColumns' => array('numcot','despro'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
      'columns' => array(
		  ARRAY('name'=>'punit','type'=>'raw','header'=>'P.unit','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).$data->simbolo."  ".MiFactoria::decimal($data->punit,2).Chtml::closeTag("span")','htmlOptions'=>array('width'=>75)),
		  ARRAY('name'=>'numcot','header'=>'Oc','htmlOptions'=>array('width'=>50)),
		  'codentro',
		  'codigoalma',
		  array(
			  'name'=>'fechanominal',
			  'header'=>'Fec',
			  'value'=>'date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>'50')
		  ),
		  array('name'=>'despro','value'=>'$data->despro','htmlOptions'=>array('width'=>100)),
		  array('name'=>'cant','htmlOptions'=>array('width'=>10)),
		  array('name'=>'desum','value'=>'$data->desum','htmlOptions'=>array('width'=>10)),
        //'descri',
		  //ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo','htmlOptions'=>array('width'=>5)),
		  ARRAY('name'=>'entregado','type'=>'html','header'=>'Entr.','value'=>'($data->entregado>0)?round($data->entregado,3).CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"):""','htmlOptions'=>array("width"=>55)),

	  ),
    ));

?>
